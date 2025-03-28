<!-- footer -->
    <footer class="">
        <div class="container-fluid W3Layouts">
            
            <div class="W3Layouts-footer-grids row">
              <div class="col-md-12 col-lg-12 mt-lg-0 mt-5 W3Layouts-footer-grid center"><br><br><br>
                    <!-- <h4 class="W3Layouts">Copy Rights</h4> -->
                    <p class="W3Layouts" style="color:black">&copy; 2025 Campus Club Managment System | All Rights Reserved </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
	
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
          } else {
            document.getElementById("movetop").style.display = "none";
          }
        }
        
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
        </script>
    <!-- /move top -->

	<!-- requires js files -->
    <script src='<?php echo base_url();?>assets/admin/js/jquery.min.js'>"+"<"+"/script>
    <script src="<?php echo base_url()?>assets/website/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/website/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.toast.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootbox.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/check_validation.js"></script>
        

</body>


<?php
if($this->session->flashdata('success')!='')

{

$msg=$this->session->flashdata('success');

$heading='Success';

$icon='success';

}

else if($this->session->flashdata('error')!=''){

$msg=$this->session->flashdata('error');

$heading='Error';

$icon='error';

}

else if(isset($error) && $error!=''){

$msg=$error;

$heading='Error';

$icon='error';

}

else if(isset($success) && $success!=''){

$msg=$success;

$icon='success';

$heading='Success';

}

?>

<script type="text/javascript">

jQuery(function($) {
    
<?php if($msg!=''){?>

    $.toast({

    heading: '<?php echo $heading;?>',

    text: '<?php echo $msg;?>',

    showHideTransition: 'fade',

    position: 'top-center',

    icon: '<?php echo $icon;?>'

    });

<?php } ?>



});

</script>



<style type="text/css">

  .td_action

  {

    width: 100px;

  }

  .td_action_extra

  {

    width: 135px;

  }

</style>


</html>

