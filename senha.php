<?php
echo "SHA1 ".SHA1("123teste");
// c65d402856c41442bdc375db3d7d80c636e1132b

//antiga
//9ed4741b942ded22622b7745c108eb0ee8a40256
echo "<br>757 - md5 " .md5("757");


echo  "<br><br>md5 demo... ".md5("demo"); 
echo  "<br><br>SHA1 demo... ".SHA1("jakarei23"); 

echo  "<br><br>md5 @Admin321 &nbsp ".md5("@Admin321"); 
//280f5324cbe33b72ebeefbf2f879e216
echo  "<br><br>SHA1 @Admin321 &nbsp ".SHA1("@Admin321");

/*
UPDATE
    tb_cad_usuario t1 INNER JOIN tb_cad_usuario t2 ON
    (t1.id_usuario = t2.id_usuario AND t1.senha <> 0)
SET t1.senha_nova = md5(t2.senha), t1.senha =0;*/