<?php include'inc/header.php'; ?>

<style type="text/css">
  
  .tblone {
  border: 1px solid #ddd;
  margin: 20px 0;
  width: 100%;
}
 .tblone th,td{padding:5px 10px;text-align:center;}
 table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
 table.tblone tr:nth-child(2n){background:#f1f1f1;height:30px;}
</style>


<div class="left_side col-xm-12 col-sm-12 col-md-3 col-lg-3">

      <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
           Saved Search
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
     
           <div class="btn-group">
            <button type="button" class="my_btn btn btn-default">Clear Form</button>
          </div>

      </div>
        <br>

       <!-- Search box -->

      <div class="frm_area col-xm-12 col-sm-12 col-md-12 col-lg-12">
        <form action="" class="">
    
          <div class="my_frm form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <h6 class="my_title">Search By name</h6>
                <input type="text" class="my_title form-control" name="livesearch" id="livesearch" placeholder="Ex: John Mia"/>
              

            <h6 class="my_title">Job Title</h6>
              <input type="text" class="my_title form-control " name="searchBytitle" id="searchBytitle" placeholder="ex.Ceo"/>


            <h6 class="my_title">Company Name/Url</h6>
                  <input type="text" class="my_title form-control" name="searchBycompany" id="searchBycompany" placeholder="Ex. HP"/>

            <h6 class="my_title">City/State/Country</h6>
                  <input type="text" class="my_title form-control" name="cityOrCountry" id="cityOrCountry" placeholder="Ex:Sylhet or Bangladesh"/>
          </div>
        </form>
      </div>
    </div>

    
   <!--  Main Content  -->
    <div class="ryt_area col-xm-12 col-sm-12 col-md-8 col-lg-8">
      <div class=" header_ryt">
            <div class="imgcls col-xm-12 col-sm-12 col-md-12 col-lg-12">
              <a href=""><img src="img/11.png"></a>
              <a href=""><img src="img/12.png"></a>
              <a href=""><img src="img/13.png"></a>
            </div>
      </div>
     <div id="statuslive"></div>
      <p class="copy">Copyright &copy 2017 RJ information All Rights Reserved </p>
    </div>

<script type="text/javascript">
  $(document).ready(function(){
      $("#livesearch").keyup(function(){
        var live = $(this).val();
        if (live != '') {
        $.ajax({
          url:"check/checklivesearch.php",
          method:"POST",
          data:{search:live},
          success:function(data){
          $('#statuslive').html(data);
          }
        });
      }else{
        $('#statuslive').html("");
      }
      }); 

    // Search by job title
      $("#searchBytitle").keyup(function(){
      var live = $(this).val();
      if (live != '') {
      $.ajax({
        url:"check/checkliveTitle.php",
        method:"POST",
        data:{search:live},
        success:function(data){
        $('#statuslive').html(data);
        }
      });
    }else{
      $('#statuslive').html("");
    }
    }); 

      // Search by company name
      $("#searchBycompany").keyup(function(){
      var live = $(this).val();
      if (live != '') {
      $.ajax({
        url:"check/checklivecompany.php",
        method:"POST",
        data:{search:live},
        success:function(data){
        $('#statuslive').html(data);
        }
      });
    }else{
      $('#statuslive').html("");
    }
    }); 



       // Search by city or country
      $("#cityOrCountry").keyup(function(){
      var live = $(this).val();
      if (live != '') {
      $.ajax({
        url:"check/checkliveCityCountry.php",
        method:"POST",
        data:{search:live},
        success:function(data){
        $('#statuslive').html(data);
        }
      });
    }else{
      $('#statuslive').html("");
    }
    }); 


      // hover

      

  });

</script> 

<script type="text/javascript">
  $(document).ready(function(){
    $('.hover').popover({  
                title:fetchData,  
                html:true, 
                placement:'right'  
           });  
           function fetchData(){  
                var fetch_data = '';  
                var element = $(this);  
                var id = element.attr("id");  
                $.ajax({  
                     url:"check/checliveForHover.php",  
                     method:"POST",  
                     async:false,  
                     data:{id:id},  
                     success:function(data){  
                          fetch_data = data;  
                     }  
                });  
                return fetch_data;  
           } 

  });

</script>



<?php include'inc/footer.php'; ?>