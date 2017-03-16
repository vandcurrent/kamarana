<script language="javascript" type="text/javascript">

function CekEmail(teks)
{
	if((teks=="")||(teks.indexOf('@')==-1)||(teks.indexOf('.')==-1)) return (false);
	return true;
}
function Cekkarakter(teks)
{
	if ((teks==""))return (false);
	return true;
}

// start sign up
function userval(addsignup)
{
	
	
	<?php
	$query = mysql_query("select email from admin",koneksi_db());
	
	while ($data = mysql_fetch_array($query))
	{
		$email = $data['email'];
		echo "if (document.addsignup.email.value == \"".$email."\"){";
		//echo "alert('Email sudah dipakai');"; 
		echo "document.getElementById('alert_email').innerHTML='Email Sudah Dipakai';";
		echo "document.addsignup.email.value = \"\";";
		echo "document.addsignup.email.focus();";
		echo "return(false);}";	    
	}
  
   ?>
   
}
$(document).ready(function() {

	$("#addsignup").submit(function() 
	{
		if (!CekEmail(this.email.value)) 
		{
			document.getElementById('alert_email').innerHTML='email tidak valid';
			this.email.focus();
			return (false);
		}
		
		if (!Cekkarakter(this.name_user.value)) 
		{
			document.getElementById('alert_name_user').innerHTML='name tidak valid';
			this.name_user.focus();
			return (false);
		}
		
		if ((this.password.value.length < 5)) 
		{
			document.getElementById('alert_password').innerHTML='Password minimal 5 Karakter';
			this.password.focus();
			return (false);
		}
		
		if ((this.password.value != this.repassword.value )) 
		{
			document.getElementById('alert_repassword').innerHTML='Retype Password Tidak Valid';
			this.repassword.focus();
			return (false);
		}
		
		$.post('include/lib_func.php?kd=add_account', {
			email : $('#email').val(),			
			name_user : $('#name_user').val(),
			repassword : $('#repassword').val()
		}, function(data) {
			document.getElementById('hasil').innerHTML=data;
			document.addsignup.email.value = "";
			document.getElementById('alert_email').innerHTML='';
			document.addsignup.name_user.value = "";
			document.getElementById('alert_name_user').innerHTML='';
			document.addsignup.password.value = "";
			document.getElementById('alert_password').innerHTML='';
			document.addsignup.repassword.value = "";
			document.getElementById('alert_repassword').innerHTML='';
			
		});
		return false;
		
	});
});

$(document).ready(function(){
  $("deactive_admin").click(function(){
  	email = $('#deactive_admin').val();
   alert(email);
  });
});


var ajaxRequest;
function getAjax() //fungsi untuk mengecek AJAX pada browser
{
	try
	{
		ajaxRequest = new XMLHttpRequest();
	}
	catch (e)
	{
		try
		{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e) 
		{
			try
			{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e)
			{
				alert("Browser Tidak Support ");
				return false;
			}
		}
	}
}

function search_for_admin() //fungsi menangkap input search dan menampilkan hasil search
{
	getAjax();


	kata = document.getElementById('kata_admin').value;
	kriteria = document.getElementById('kriteria_admin').value;

	
		ajaxRequest.open("GET","main/admin/admin_hasil.php?kata="+kata+"&kriteria="+kriteria);
		ajaxRequest.onreadystatechange = function()
		{
			document.getElementById("konten_admin").innerHTML = ajaxRequest.responseText;
		}
		ajaxRequest.send(null);
	
}

function search_for_anggota() //fungsi menangkap input search dan menampilkan hasil search
{
	getAjax();


	kata = document.getElementById('kata_anggota').value;
	kriteria = document.getElementById('kriteria_anggota').value;

	
		ajaxRequest.open("GET","main/anggota/anggota_hasil.php?kata="+kata+"&kriteria="+kriteria);
		ajaxRequest.onreadystatechange = function()
		{
			document.getElementById("konten_anggota").innerHTML = ajaxRequest.responseText;
		}
		ajaxRequest.send(null);
	
}

function kategori_cek(addkategori)
{
	
	
	<?php
	$query = mysql_query("select subcat_name from subcategory",koneksi_db());
	
	while ($data = mysql_fetch_array($query))
	{
		$subcat_name = $data['subcat_name'];
		echo "if (document.addkategori.nama.value == \"".$subcat_name."\"){";
		//echo "alert('Email sudah dipakai');"; 
		echo "document.getElementById('alert_nama').innerHTML='Sub Kategori Sudah Terdaftar';";
		echo "document.addkategori.nama.value = \"\";";
		echo "document.addkategori.nama.focus();";
		echo "return(false);}";	    
	}
  
   ?>
   
}



$(document).ready(function() {

	$("#addkategori").submit(function() 
	{
		
		if (!Cekkarakter(this.nama.value)) 
		{
			document.getElementById('alert_nama').innerHTML='Nama Sub Kategori tidak valid';
			this.nama.focus();
			return (false);
		}
		
		
		$.post('include/lib_func.php?kd=add_kat', {
			nama : $('#nama').val()
		}, function(data) {
			document.getElementById('hasil').innerHTML=data;
			document.addkategori.nama.value = "";
			document.getElementById('alert_nama').innerHTML='';
			
		});
		return false;
		
	});
});

$(document).ready(function() {

	$("#editkategori").submit(function() 
	{
		
		if (!Cekkarakter(this.nama.value)) 
		{
			document.getElementById('alert_nama').innerHTML='Nama Sub Kategori tidak valid';
			this.nama.focus();
			return (false);
		}
		
		
		$.post('include/lib_func.php?kd=edit_kat', {
			nama : $('#nama').val(),
			id : $('#id').val()
		}, function(data) {
			document.getElementById('hasil').innerHTML=data;
			document.addkategori.nama.value = "";
			document.getElementById('alert_nama').innerHTML='';
			
		});
		return false;
		
	});
});


function search_for_tulisan() //fungsi menangkap input search dan menampilkan hasil search
{
	getAjax();


	kata = document.getElementById('kata_tulisan').value;
	kriteria = document.getElementById('kriteria_tulisan').value;

	
		ajaxRequest.open("GET","main/tulisan/tulisan_hasil.php?kata="+kata+"&kriteria="+kriteria);
		ajaxRequest.onreadystatechange = function()
		{
			document.getElementById("konten_tulisan").innerHTML = ajaxRequest.responseText;
		}
		ajaxRequest.send(null);
	
}

$(document).ready(function() {

	$("#gantinama").submit(function() 
	{
		
		if (!Cekkarakter(this.name_user.value)) 
		{
			document.getElementById('alert_name_user').innerHTML='name tidak valid';
			this.name_user.focus();
			return (false);
		}
		
		$.post('include/lib_func.php?kd=edit_account', {
			id_admin : $('#id_admin').val(),			
			name_user : $('#name_user').val()
		}, function(data) {
			document.getElementById('hasil').innerHTML=data;
			document.addsignup.name_user.value = "";
			document.getElementById('alert_name_user').innerHTML='';
			
		});
		return false;
		
	});
});


$(document).ready(function() {

	$("#gantipassword").submit(function() 
	{
		
		if (!Cekkarakter(this.password.value)) 
		{
			document.getElementById('alert_password').innerHTML='Password tidak valid';
			this.password.focus();
			return (false);
		}
		else
		{
			document.getElementById('alert_password').innerHTML='';
		}

		if (!Cekkarakter(this.repassword.value)) 
		{
			document.getElementById('alert_repassword').innerHTML='Retype Password tidak valid';
			this.repassword.focus();
			return (false);
		}
		else
		{
			document.getElementById('alert_repassword').innerHTML='';
		}

		if ((this.repassword.value) != (this.password.value) ) 
		{
			document.getElementById('alert_repassword').innerHTML='Retype Password tidak Sesuai';
			this.repassword.focus();
			return (false);
		}
		else
		{
			document.getElementById('alert_repassword').innerHTML='';
		}

		if (!Cekkarakter(this.old_password.value)) 
		{
			document.getElementById('alert_old_password').innerHTML='Old Password tidak valid';
			this.old_password.focus();
			return (false);
		}
		else
		{
			document.getElementById('alert_old_password').innerHTML='';
		}
		
		$.post('include/lib_func.php?kd=edit_pwd', {
			password     : $('#password').val(),
			repassword   : $('#repassword').val(),
			old_password : $('#old_password').val(),			
			id_admin    : $('#id_admin').val()
		}, function(data) {
			document.getElementById('hasil').innerHTML=data;
			document.gantipassword.password.value = "";
			document.getElementById('alert_password').innerHTML='';

			document.gantipassword.repassword.value = "";
			document.getElementById('alert_repassword').innerHTML='';

			document.gantipassword.old_password.value = "";
			document.getElementById('alert_old_password').innerHTML='';
			
		});
		return false;
		
	});
});
//end
</script>
