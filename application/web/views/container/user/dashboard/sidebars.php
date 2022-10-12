
<!--    <a href="/"><img src="<?php echo $_SESSION["logo"]; ?>" alt="logo" ></a>-->
<style>
    #cssmenu{
        width: auto !important;
    }
    #c2{
        display:block;
    }
    @media only screen and (max-width: 600px){
        /*Big smartphones [426px -> 600px]*/
        #c2{
            display:none;
        }
    }
    @media only screen and (max-width: 425px){
        /*Small smartphones [325px -> 425px]*/
        #c2{
            display:none;
        }
    }
</style>
<div id="c2">
    <div id='cssmenu' class="wd_single_index_menu">
        <ul>

            <?php
            $main->isLoadView("mobilenav", false, array());
            ?>

        </ul>
    </div>
</div>
