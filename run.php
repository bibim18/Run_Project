<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js" charset="utf-8"></script>
	<style type="text/css">
   .right
  {
    font-size: 1.5em;
    font-family: "JasmineUPC";
    display: inline-block;
    text-align: center;
    border: 3px solid #037088;
    width:45%;
    padding-bottom:20px;
    padding-top: 20px;
  }
  .confirm
    {
      font-family: "JasmineUPC";
      background-color: white;
      color: #D3F7F9;
      border-radius:10px;
      font-size:1em;

      background-color:#037099;
    }
    .confirm:hover
    {
      background-color:#33C7FF;
    }
     .confirm1
    {
      font-family: "JasmineUPC";
      background-color: white;
      color: #D3F7F9;
      border-radius:10px;
      font-size:1em;

      background-color:#037099;
    }
    .confirm1:hover
    {
      background-color:#33C7FF;
    }

  .left
  {
    margin-top: 0px;
    font-size: 1.5em;
    display: inline-block;
    text-align: center;
    width:45%;
  }
  .bt
    {
      font-family: "JasmineUPC";
      color: #D3F7F9;
      border-radius:10px;
      padding:10px;
      font-size:1.5em;
      background-color:#037099;
    }
    .bt:hover
    {
      background-color:#33C7FF;
    }
    input[type=text]
    {
      font-size:16pt;
      font-family: "JasmineUPC";
    }
    .main
    {
    	text-align: center;
    }
    .header
    {
    	background-color: #037099;
    	padding-bottom: 5px;
      padding-top: 5px;
    }
</style>
</head>
<body>
	  <div class="App">
	  	<div class="main">
	  		<div class="header">
	          <img src="./image/logo.png" width="100px" class="App-logo" alt="logo" />
	          <h1>Run Festivel Register </h1>
      		</div>

        <div class="left">
          <input type="submit" class="bt" name="bt" value="ตรวจสอบผลการลงทะเบียน"/>
	        <div class="searchData">
							<div>
		              <input type='text' name='namelname' size='40' maxlength="13" placeholder='กรุณากรอกรหัสประจำตัวประชาชน'/>
		              <input type='submit' class='confirm' name='check' value="ตรวจสอบ" />
		         </div>
	        </div>
      	</div>
          
            <div class="right">
              <strong>ลงทะเบียน "มหกรรมการเดินวิ่ง"</strong>
              <br/>
              <br/>
              <table align="center">
                <tr>
                  <td align="right">รหัสบัตรประชาชน :</td>
                  <td><input type="text" name="id" maxlength="13" /></td>
                </tr>
                <tr>
                  <td align="right">ชื่อ :</td>
                  <td><input type="text" name="name"/></td>
                </tr>
                 <tr>
                  <td align="right">นามสกุล :</td>
                  <td><input type="text" name="lname"/></td>
                </tr>
                 <tr>
                  <td align="right">ประเภทการวิ่ง :</td>
                  <td><input type="radio" name="runType" value="5" /> 5 กิโลเมตร <input type="radio" name="runType" value="10" /> 10 กิโลเมตร</td>
                </tr>
                <tr>
                  <td align="right">Facebook :</td>
                  <td><input type="text" name="facebook" /></td>
                </tr>
              </table>
              <br/>
              <input type='submit' class="confirm1" name="register" value="ลงทะเบียน" onClick=>
            </div>
       
      </div>
      </div>
			<script type="text/javascript">
			$(document).ready(function(){
				$(".searchData").hide();
				$(".bt").click(function(){
								$(".searchData").show();
				});
				$(".confirm").click(function(){
							var name = $("input[name='namelname']").val();
							$.ajax({
								   type: "POST",
								   url: "query_user.php",
								   cache: false,
								   data: "id="+name,
								   success: function(msg){
										 swal({
												 title: '<i>ผลการลงทะเบียน</i>',
												 type: 'success',
												 html: msg
									   })

							   	}
							 });
					});
              $(".confirm1").click(function(){
              var id = $("input[name='id']").val();
              var name = $("input[name='name']").val();
              var lname = $("input[name='lname']").val();
              var runType = $("input[name='runType']").val();
              var facebook = $("input[name='facebook']").val();
               //alert(id+name+lname+runType+facebook);
              $.ajax({
                   type: "POST",
                   url: "insert_user.php",
                   cache: false,
                   data: "id="+id +"&name="+name+"&lname="+lname+"&runType="+runType+"&facebook="+facebook,
                   success: function(msg){
                     swal({
                         title: '<i>ลงทะเบียนสำเร็จแล้ว</i>',
                         type: 'success',
                         html: msg
                     })

                  }
               });
          });
				});
			</script>
</body>
</html>
