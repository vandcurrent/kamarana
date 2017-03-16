<?php
if(($_SESSION['level']) == "Master")
{
switch($dir)
		{
			case  "ang_vw":
			include "main/anggota/anggota_view.php";
			break;

			case  "ang_trs":
			include "main/anggota/anggota_trash.php";
			break;

			case  "ang_sch":
			include "main/anggota/anggota_search.php";
			break;

			case  "adm_vw":
			include "main/admin/admin_view.php";
			break;

			case  "adm_add":
			include "main/admin/admin_add.php";
			break;

			case  "adm_sch":
			include "main/admin/admin_search.php";
			break;

			case  "adm_trs":
			include "main/admin/admin_trash.php";
			break;

			case  "kat_vw":
			include "main/kategori/kategori_view.php";
			break;

			case  "kat_trs":
			include "main/kategori/kategori_trash.php";
			break;

			case  "kat_add":
			include "main/kategori/kategori_add.php";
			break;

			case  "kat_edit":
			include "main/kategori/kategori_edit.php";
			break;

			case  "thr_vw":
			include "main/tulisan/tulisan_view.php";
			break;

			case  "thr_trs":
			include "main/tulisan/tulisan_trash.php";
			break;

			case  "thr_sch":
			include "main/tulisan/tulisan_search.php";
			break;

			case  "thr_dtl":
			include "main/tulisan/tulisan_detail.php";
			break;

			case  "akn_nm":
			include "main/akun/akun_edit_nama.php";
			break;

			case  "akn_pwd":
			include "main/akun/akun_edit_password.php";
			break;

			case  "akn_lgt":
			include "main/akun/logout.php";
			break;

			default :
			include "main/tulisan/tulisan_view.php";
			break;

			case  "pg":
			include "include/lib_func.php";
			break;

		}
}
else
{
	switch($dir)
		{
			case  "ang_vw":
			include "main/anggota/anggota_view.php";
			break;

			case  "ang_trs":
			include "main/anggota/anggota_trash.php";
			break;

			case  "ang_sch":
			include "main/anggota/anggota_search.php";
			break;

			case  "kat_vw":
			include "main/kategori/kategori_view.php";
			break;

			case  "kat_trs":
			include "main/kategori/kategori_trash.php";
			break;

			case  "kat_add":
			include "main/kategori/kategori_add.php";
			break;

			case  "kat_edit":
			include "main/kategori/kategori_edit.php";
			break;

			case  "thr_vw":
			include "main/tulisan/tulisan_view.php";
			break;

			case  "thr_trs":
			include "main/tulisan/tulisan_trash.php";
			break;

			case  "thr_sch":
			include "main/tulisan/tulisan_search.php";
			break;

			case  "thr_dtl":
			include "main/tulisan/tulisan_detail.php";
			break;

			case  "akn_nm":
			include "main/akun/akun_edit_nama.php";
			break;

			case  "akn_pwd":
			include "main/akun/akun_edit_password.php";
			break;

			case  "akn_lgt":
			include "main/akun/logout.php";
			break;

			default :
			include "main/tulisan/tulisan_view.php";
			break;

			case  "pg":
			include "include/lib_func.php";
			break;
		}
}
?>