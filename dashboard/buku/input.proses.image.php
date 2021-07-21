<?php

		
			// get the original name of the file from the clients machine
			$filename = $_FILES['image']['name'];
			
			// get the extension of the file in a lower case format
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			// if it is not a known extension, we will suppose it is an error, print an error message
			//and will not upload the file, otherwise we continue
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
			{
			//echo '<h1>Unknown extension!</h1>';
			echo "<script>window.alert('Maaf, hanya mendukung Jpg, jpeg, dan PNG.');
						 window.location=('../?v=buku&act=input&info=FileIsNotSupported')</script>";
			$errors=1;
			}
			else
			{
			// get the size of the image in bytes
			// $_FILES[\'image\'][\'tmp_name\'] is the temporary filename of the file in which the uploaded file was stored on the server
			$size=getimagesize($_FILES['image']['tmp_name']);
			$sizekb=filesize($_FILES['image']['tmp_name']);
			
			//compare the size with the maxim size we defined and print error if bigger
			if ($sizekb > MAX_SIZE*1024)
			{
/*
			echo '<h1>You have exceeded the size limit!</h1>';
			echo '<h1>Copy unsuccessfull!</h1>';
*/
			echo "<script>window.alert('Maaf, file harus < 800 KB');
						 window.location=('../?v=buku&act=input&info=ImageTooLarge')</script>";
			$errors=1;
			}
			 
			else
			{
			//we will give an unique name, for example the time in unix time format
			$image_name=time().'.'.$extension;
			//the new name will be containing the full path where will be stored (images folder)
			
			 $ins=mysql_query("INSERT INTO buku(isbn,
                                    judul,
                                    nomorEdisi,
                                    copyright,
                                    deskripsi,
                                    IDPenerbit,
                                    harga,
                                    fileGambar)
                                    
                             VALUES('$Pisbn',
                            		'$Pjudul',
                            		'$PnomorEdisi',
                            		'$Pcopyright',
                            		'$Pdeskripsi',
                            		'$PIDPenerbit',
                            		'$Pharga',
                            		'$image_name')");
			
				
			$newname="../img/".$image_name;
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			//we verify if the image has been uploaded, and print error instead
			// the new thumbnail image will be placed in images/thumbs/ folder
			$thumb_name='../img/thumb_'.$image_name;
			// call the function that will create the thumbnail. The function will get as parameters
			//the image name, the thumbnail name and the width and height desired for the thumbnail
			$thumb=make_thumb($newname,$thumb_name,WIDTH,HEIGHT);
			
			header("location:../?v=buku&info=Success");
			}}   	


?>
