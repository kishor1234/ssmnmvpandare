<?php
/**
 * This code is licensed under AGPLv3 license or Afterlogic Software License
 * if commercial version of the product was purchased.
 * For full statements of the licenses see LICENSE-AFTERLOGIC and LICENSE-AGPL3 files.
 */

namespace Afterlogic\DAV\FS\S3\Personal;

use Aws\S3\S3Client;
use Afterlogic\DAV\Server;
use Aurora\Modules\S3Filestorage;

/**
 * @license https://www.gnu.org/licenses/agpl-3.0.html AGPL-3.0
 * @license https://afterlogic.com/products/common-licensing Afterlogic Software License
 * @copyright Copyright (c) 2019, Afterlogic Corp.
 */
class Root extends Directory 
{
	protected $client = null;

	public function __construct($sUserPublicId = null) 
	{
		$oModule = S3Filestorage\Module::getInstance();

		$sBucketPrefix = $oModule->getConfig('BucketPrefix');

		$sBucket = \strtolower($sBucketPrefix . \str_replace(' ', '-', Server::getTenantName()));

		$sHost = $oModule->getConfig('Host');
		$sRegion = $oModule->getConfig('Region');
		$endpoint = "https://".$sRegion.".".$sHost;

		$client = $this->getS3Client($endpoint);

		if(!$client->doesBucketExist($sBucket)) 
		{
			$client->createBucket([
				'Bucket' => $sBucket
			]);
			$client->putBucketCors([
				'Bucket' => $sBucket,
				'CORSConfiguration' => [
					'CORSRules' => [
						[
							'AllowedHeaders' => [
								'*',
							],
							'AllowedMethods' => [
								'GET',
								'PUT',
								'POST',
								'DELETE',
								'HEAD'
							],
							'AllowedOrigins' => [
								(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"
							],
							'MaxAgeSeconds' => 0,
						],
					],
				],
				'ContentMD5' => '',
			]);				

		}

		$endpoint = "https://".$sBucket.".".$sRegion.".".$sHost;
		$this->client = $this->getS3Client($endpoint, true);

		if (empty($sUserPublicId))
		{
			$sUserPublicId =  $this->getUser();
		}

		$path = '/' . $sUserPublicId;

		parent::__construct($path, $sBucket, $this->client);
	}

	protected function getS3Client($endpoint, $bucket_endpoint = false)
	{
		$oModule = S3Filestorage\Module::getInstance();

		$signature_version = 'v4';
		if (!$bucket_endpoint)
		{
			$signature_version = 'v4-unsigned-body';
		}

		$sRegion = $oModule->getConfig('Region');
		$sAccessKey = $oModule->getConfig('AccessKey');
		$sSecretKey = $oModule->getConfig('SecretKey');


		return S3Client::factory([
			'region' => $sRegion,
			'version' => 'latest',
			'endpoint' => $endpoint,
			'credentials' => [
				'key'    => $sAccessKey,
				'secret' => $sSecretKey,
			],
			'bucket_endpoint' => $bucket_endpoint,
			'signature_version' => $signature_version
		]);					
	}	

	public function getName() 
	{
        return 'personal';
    }	
	
	public function setName($name) 
	{
        throw new \Sabre\DAV\Exception\Forbidden();
    }

	public function delete() 
	{
        throw new \Sabre\DAV\Exception\Forbidden();
    }
	
	protected function getUsedSize($sUserPublicId)
	{
		$iSize = 0;

		if (!empty($sUserPublicId))
		{
			$oSearchResult = $this->client->getPaginator('ListObjectsV2', [
				'Bucket' => $this->bucket,
				'Prefix' => $sUserPublicId . '/'
			])
			->search('Contents[?Size.to_number(@) != `0`].Size.to_number(@)');
			
			foreach ($oSearchResult as $size)
			{
				$iSize += $size;
			}
		}
		
		return $iSize;
	}

	public function getQuotaInfo()
	{

		$oUser = \Aurora\Modules\Core\Module::getInstance()->getUserByPublicId($this->getUser());
		$sUserSpaceLimitInMb = -1;

		if ($oUser)
		{
			$sUserSpaceLimitInMb = $oUser->{'Files::UserSpaceLimitMb'} * 1024 * 1024;
		}

 		return [
			$this->getUsedSize($this->UserPublicId),
//			S3Filestorage\Module::getInstance()->getConfig('UserSpaceLimitMb', 0) * 1024 * 1024
			$sUserSpaceLimitInMb
		];
    }	
}
