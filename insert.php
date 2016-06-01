<?php
include('db.php');

$songs=array("songs/Thanga Thamarai - Minsara Kana - TamilWire.wav","songs/Thee Illai - TamilTunes.wav","songs/Thee Thithukkum Thee - Thiruda - TamilWire.wav","songs/Thendralae Thendralae - Kaadha - TamilWire.wav","songs/Thenmetku Paruvakatru - Karuth - TamilWire.wav","songs/Thillana Thillana - Muthu - TamilWire.wav","songs/Thoda Thoda - Indira - TamilWire.wav","songs/Usure Pogudhey - TamilTunes.wav","songs/Uyire Uyire - Bombay - TamilWire.wav","songs/Uyirum Neeye - Pavithra - TamilWire.wav","songs/Vaada Bin Laada - TamilTunes.wav","songs/Vaarayo Vaarayo - TamilTunes.wav","songs/Veerapandi Kottayilae - Thirud - TamilWire.wav","songs/Vennila Vennila Vennilave - Ir - TamilWire.wav","songs/Vennilave Vennilave - Minsara - TamilWire.wav","songs/Yathe Yathe - TamilTunes.wav","songs/Yenakke Yenakka - Jeans - TamilWire.wav","songs/Aaromale - TamilWire.wav","songs/Acham Acham Illai - Indira -.wav","songs/Adiyae Kolluthey - TamilTunes.wav","songs/Amali Thumali - TamilTunes.wav","songs/Anantha Kuyilin Paatu - Kadhaluku Mariyathai - TamilWire.wav","songs/Anantham Anantham - Poove Unakaga - TamilWire.wav","songs/Anbae Anbae - Jeans - TamilWire.wav","songs/Anbil Avan - TamilWire.wav","songs/Anjali Anjali - Duet - TamilWire.wav","songs/Aththi Athikai - Aadhi - TamilWire.wav","songs/Ava Enna - TamilTunes.wav","songs/Azhagooril Poothavale - Thirumalai - TamilWire.wav","songs/Chakkarai Nilave - Youth - TamilWire.wav","songs/Chanthiranai Thottathu - Ratch - TamilWire.wav","songs/Chinna Chinna Aasai - Roja - TamilWire.wav","songs/Chinna Thamarai  - Vettaikaaran - TamilWire.wav","songs/Een Penenru - Love Today - TamilWire.wav","songs/En Kaadhale - Duet - TamilWire.wav","songs/En Kadhal Solla - TamilTunes.wav","songs/En Veedu Thodathil - Gentelman - TamilWire.wav","songs/Enakoru Snehithi - Priyamanavale - TamilWire.wav","songs/Engeyum Kaadhal - TamilTunes.wav","songs/Enmel Vizhuntha - May Maatham - TamilWire.wav","songs/Enna Azhaku - Love Today - TamilWire.wav","songs/Ennai Kanavillaiyae - Kaadhal - TamilWire.wav","songs/Ennai Thalatha Varuvalo - Kadhaluku Mariyathai - TamilWire.wav","songs/Ennamo Yeadho - TamilTunes.wav","songs/Ennavalae Adi Ennavalae - Kadh - TamilWire.wav","songs/Ennavale Ennavale - Nintheen Vanthaai - TamilWire.wav","songs/Ennavo Ennavo - Priyamanavale - TamilWire.wav","songs/Hosanna - TamilWire.wav","songs/Idhazhin Oram - The Innocence Of Love - TamilTunes.wav","songs/Idhu Varai - TamilTunes.wav","songs/Innisai Paadi Varum - Thullatha Manamum Thullum - TamilWire.wav","songs/Iruvathu Kodi Nilavu - Thullatha Manamum Thullum - TamilWire.wav","songs/Ithuthan Kaathal Enbadha - .wav","songs/July Malargale - Bagavathy - TamilWire.wav","songs/Kaadhal Rojaavae - Roja - .wav","songs/Kadhal Solvathu - Badhri - TamilWire.wav","songs/Kaiyil Mithakkum - Ratchakan -.wav","songs/Kalvare - TamilTunes.wav","songs/Kandean Kandean - Madhura - TamilWire.wav","songs/Kangal Irandal - TamilTunes.wav","songs/Kanmoodi Thirakkum Pothu - Sachin - TamilWire.wav","songs/Kannalane - Bombay -.wav","songs/Kannodu Kanpathellam - Jeans -.wav","songs/Kannukku Mai Azhagu - Puthiya - TamilWire.wav","songs/Kannukkul Kannai - TamilWire.wav","songs/Kappaleri Poyachu - Indian - TamilWire.wav","songs/Kelamal Kaiyilae - Azhagiya Tamil Mahan - TamilWire.wav","songs/Koncha Naal - Aasai - TamilWire.wav","songs/Kucchi Kuchi Rakkamma - Bombay - TamilWire.wav","songs/Lolita - TamilTunes.wav","songs/Malargale Malargale - Love Bir - TamilWire.wav","songs/Manasey - Nenjiniley - TamilWire.wav","songs/Mannipaaya - TamilWire.wav","songs/Marudaani - TamilTunes.wav","songs/Megamai Vandu - Thullatha Manamum Thullum - TamilWire.wav","songs/Mel Isaiye - Mr.romeo - TamilWire.wav","songs/melliname.wav","songs/Molachu Moonu - TamilTunes.wav","songs/Mun Andhi - TamilTunes.wav","songs/Mundhinam - TamilTunes.wav","songs/Nalam Nalamariya Aaval - Kadhal Koatai - TamilWire.wav","songs/Narumugaiye - Iruvar - TamilWire.wav","songs/Nee Paartha Vizhigal - The Touch Of Love - TamilTunes.wav","songs/Nenjukkul Peidhidum - TamilTunes.wav","songs/Nila Kaigiradhu - Indira - TamilWire.wav","songs/Oh Vennila - Kaadhal Desam - TamilWire.wav","songs/Omana Penne - TamilWire.wav","songs/Otha Sollaala - TamilTunes.wav","songs/Pachaikiligal Tholodu - Indian - TamilWire.wav","songs/Po Nee Po - The Pain Of Love - TamilTunes.wav","songs/Poo Pukkum Oosai - Minsara Kan - TamilWire.wav","songs/Pookkal Pookkum - TamilTunes.wav","songs/Poovukkul Olinthirukkum - Jean - TamilWire.wav","songs/Poralea Ponnuthayi - Karuththa - TamilWire.wav","songs/Pudhu Vellai Mazhai - Roja - TamilWire.wav","songs/Santhana Thenralai - Kandukonden Kandu Konden - TamilWire.wav","songs/atham Ellatha - Amarkalam - TamilWire.wav","songs/Stramberry - Minsara Kanavu - TamilWire.wav");
$ans=array("Thanga Thamarai","Thee Illai","Thee Thithukkum Thee","Thendralae Thendralae","Thenmetku Paruvakatru","Thillana Thillana","Thoda Thoda","Usure Pogudhey","Uyire Uyire","Uyirum Neeye","Vaada Bin Laada","Vaarayo Vaarayo","Veerapandi Kottayilae","Vennila Vennila Vennilave","Vennilave Vennilave","Yathe Yathe","Yenakke Yenakka","Aaromale","Acham Acham Illai","Adiyae Kolluthey","Amali Thumali","Anantha Kuyilin Paatu","Anantham Anantham","Anbae Anbae","Anbil Avan","Anjali Anjali","Aththi Athikai","Ava Enna","Azhagooril Poothavale","Chakkarai Nilave","Chanthiranai Thottathu","Chinna Chinna Aasai","Chinna Thamarai","Een Penenru","En Kaadhale","En Kadhal Solla","En Veedu Thodathil","Enakoru Snehithi","Engeyum Kaadhal","Enmel Vizhuntha","Enna Azhaku","Ennai Kanavillaiyae","Ennai Thalatha Varuvalo","Ennamo Yeadho","Ennavalae Adi Ennavalae","Ennavale Ennavale","Ennavo Ennavo","Hosanna","Idhazhin Oram","Idhu Varai","Innisai Paadi Varum","Iruvathu Kodi Nilavu","Ithuthan Kaathal Enbadha","July Malargale","Kaadhal Rojaavae","Kadhal Solvathu","Kaiyil Mithakkum","Kalvare","Kandean Kandean","Kangal Irandal","Kanmoodi Thirakkum Pothu","Kannalane","Kannodu Kanpathellam","Kannukku Mai Azhagu","Kannukkul Kannai","Kappaleri Poyachu","Kelamal Kaiyilae","Koncha Naal","Kucchi Kuchi Rakkamma","Lolita","Malargale Malargale","Manasey","Mannipaaya","Marudaani","Megamai Vandu","Mel Isaiye","melliname","Molachu Moonu","Mun Andhi","Mundhinam","Nalam Nalamariya Aaval","Narumugaiye","Nee Paartha Vizhigal","Nenjukkul Peidhidum","Nila Kaigiradhu","Oh Vennila","Omana Penne","Otha Sollaala","Pachaikiligal Tholodu","Po Nee Po","Poo Pukkum Oosai","Pookkal Pookkum","Poovukkul Olinthirukkum","Poralea Ponnuthayi","Pudhu Vellai Mazhai","Santhana Thenralai","atham Ellatha","Stramberry");


for($i=0;$i<count($songs);$i++)
{
$a=$songs[$i];
 $songs[$i]=str_replace(".wav",".mp3",$a);
$songs[$i]=str_replace(".mp3",".lite.mp3",$songs[$i]);
}



/*

for($i=0;$i<98;$i++)
{
 $r=rand(0,98);
 $r1=rand(0,98);
 $r2=rand(0,98);
 $link1=$songs[$i];
 $ans1=$ans[$i];
 
 if($r==$i || $r1==$i || $r2==$i || $r==$r1 || $r==$r2 || $r1==$r2)
 {
 $i=$i-1;
 continue;
 }
 
 $choice1=$ans[$r1];
 $choice2=$ans[$r2];
 $choice3=$ans[$r];
 $c=rand(0,3);
  switch($c)
  {
   case 0:
   $sql="insert into song_list values('','$link1','$ans1','$choice1','$choice2','$choice3','one')" ;
   $pree=$conn->prepare($sql);
   $pree->execute();
   break;
   
   case 1:
   $sql="insert into song_list values('','$link1','$choice1','$ans1','$choice2','$choice3','two')" ;
   $pree=$conn->prepare($sql);
   $pree->execute();
   break;
   
   case 2:
   $sql="insert into song_list values('','$link1','$choice2','$choice1','$ans1','$choice3','three')" ;
   $pree=$conn->prepare($sql);
   $pree->execute();
   break;
   
   case 3:
   $sql="insert into song_list values('','$link1','$choice3','$choice1','$choice2','$ans1','four')" ;
   $pree=$conn->prepare($sql);
   $pree->execute();
   break;
  }

}

?>