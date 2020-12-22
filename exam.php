<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam portal</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="contianer bg-warning">
    <p class="h1 text-center pt-3 pb-3">Examination Portal</p>
    </div>
    <div class="pagination">
   
    </div>
</body>
</html>
<!-- <footer>
<div class="contianer bg-warning">Footer
</div></footer> -->
<script>
$(document).ready(function(){
  html='<table>';
    $.ajax({
         url:'action.php',
         method:'POST',
         data:{name:'Question',offset:0},
         dataType:'json',
        success:function(data) { 
          for(var i=0;i<data.length;i++) {
            html+='<tr><td><p>'+data[i]['Question']+'</p></td></tr>';
            html+='<tr><td><input type="radio" name="answer"> '+data[i]['option1']+'</td></tr>';
            html+='<tr><td><input type="radio" name="answer"> '+data[i]['option2']+'</td></tr>';
            html+='<tr><td><input type="radio" name="answer"> '+data[i]['option3']+'</td></tr>';
            html+='<tr><td><input type="radio" name="answer"> '+data[i]['option4']+'</td></tr>';
            html+='<tr><td><input type="button" class="bg-success rounded text-white next" data-id="'+(i+1)+'" value="   Next   "></td></tr>';
          }
          html+='</table>';
          $('.pagination').html(html);
        }
});

$(document).on('click','.next',function(){
  html='<table>';
  var value=$(this).data('id');
  $.ajax({
         url:'action.php',
         method:'POST',
         data:{name:'Question',offset:value},
         dataType:'json',
        success:function(data) { 
          for(var i=0;i<data.length;i++) {
            html+='<tr><td><p>'+data[i]['Question']+'</p></td></tr>';
            html+='<tr><td><input type="radio" name="answer"> '+data[i]['option1']+'</td></tr>';
            html+='<tr><td><input type="radio" name="answer"> '+data[i]['option2']+'</td></tr>';
            html+='<tr><td><input type="radio" name="answer"> '+data[i]['option3']+'</td></tr>';
            html+='<tr><td><input type="radio" name="answer"> '+data[i]['option4']+'</td></tr>';
            html+='<tr><td><input type="button" class="bg-success rounded text-white next" data-id="'+(value-1)+'" value="Previous"><input type="button" class="bg-success rounded text-white next" data-id="'+(value+1)+'" value="   Next   "></td></tr>';
          }
          html+='</table>';
          $('.pagination').html(html);
        }
});
});
});
   
</script>