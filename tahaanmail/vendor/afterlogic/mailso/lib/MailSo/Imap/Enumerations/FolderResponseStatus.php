<?php
/**
 * This code is licensed under AGPLv3 license or Afterlogic Software License
 * if commercial version of the product was purchased.
 * For full statements of the licenses see LICENSE-AFTERLOGIC and LICENSE-AGPL3 files.
 */

namespace MailSo\Imap\Enumerations;

/**
 * @license https://www.gnu.org/licenses/agpl-3.0.html AGPL-3.0
 * @license https://afterlogic.com/products/common-licensing Afterlogic Software License
 * @copyright Copyright (c) 2019, Afterlogic Corp.
 *
 * @category MailSo
 * @package Imap
 * @subpackage Enumerations
 */
class FolderResponseStatus
{
	const MESSAGES = 'MESSAGES';
	const RECENT = 'RECENT';
	const UNSEEN = 'UNSEEN';
	const UIDNEXT = 'UIDNEXT';
	const UIDVALIDITY = 'UIDVALIDITY';
}
