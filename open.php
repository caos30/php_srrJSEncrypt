<?php /*
 *
 *  php_srrJSEncrypt :: an easy not-database depending system for store encrypted data using only javascript on client side
    Copyright (C) 2015-2019  caos30

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along
    with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 */

 if (session_status() == PHP_SESSION_NONE) session_start();
 if (empty($_SESSION['LOGGED'])) echo "<script>document.location='login.php';</script>";

// = set config
	$version = '2020.06.15';
	$msg="";

// = data file
	$file = !empty($_GET['file']) ? trim($_GET['file']) : ( !empty($_SESSION['file']) ? trim($_SESSION['file']) : '' );
	$file = str_replace(array('.','/','\\'),'',$file);
	$file_path = dirname(__FILE__).'/data/'.$file;
	if ($file=='' || !file_exists($file_path)){
		echo "<script>document.location='index.php';</script>";
		die();
	}
	$_SESSION['file'] = $file;

// = save changes on data
	if (isset($_POST['op']) && $_POST['op']=='save'){

		$fp = fopen($file_path,"w");
		fwrite($fp,$_POST['txa']);
		fclose($fp);
		$msg = "<span class='green'>Successfully <b>saved</b>.</span>";

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $file!='' ? $file.' :: ' : '' ?> JS-ENCRYPT </title>
<meta name="title" content="JS-ENCRYPT" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="revisit-after" content="7 days" />
<meta name="robots" content="nofollow" />

<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- favicons generated at https://realfavicongenerator.net -->

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="images/favicon/manifest.json">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="images/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="JSEncrypt">
    <meta name="application-name" content="JSEncrypt">
    <meta name="msapplication-config" content="images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

<link href="images/estilos_2020-06-15.css" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" >
/* <![CDATA[ */
var keySizeInBits=256;var blockSizeInBits=128;var roundsArray=[,,,,[,,,,10,,12,,
14],,[,,,,12,,12,,14],,[,,,,14,,14,,14]];var shiftOffsets=[,,,,[,1,2,3],,[,1,2,
3],,[,1,3,4]];var Rcon=[0x01,0x02,0x04,0x08,0x10,0x20,0x40,0x80,0x1b,0x36,0x6c,
0xd8,0xab,0x4d,0x9a,0x2f,0x5e,0xbc,0x63,0xc6,0x97,0x35,0x6a,0xd4,0xb3,0x7d,0xfa,
0xef,0xc5,0x91];var SBox=[99,124,119,123,242,107,111,197,48,1,103,43,254,215,171,
118,202,130,201,125,250,89,71,240,173,212,162,175,156,164,114,192,183,253,147,38,
54,63,247,204,52,165,229,241,113,216,49,21,4,199,35,195,24,150,5,154,7,18,128,
226,235,39,178,117,9,131,44,26,27,110,90,160,82,59,214,179,41,227,47,132,83,209,
0,237,32,252,177,91,106,203,190,57,74,76,88,207,208,239,170,251,67,77,51,133,69,
249,2,127,80,60,159,168,81,163,64,143,146,157,56,245,188,182,218,33,16,255,243,
210,205,12,19,236,95,151,68,23,196,167,126,61,100,93,25,115,96,129,79,220,34,42,
144,136,70,238,184,20,222,94,11,219,224,50,58,10,73,6,36,92,194,211,172,98,145,
149,228,121,231,200,55,109,141,213,78,169,108,86,244,234,101,122,174,8,186,120,
37,46,28,166,180,198,232,221,116,31,75,189,139,138,112,62,181,102,72,3,246,14,97,
53,87,185,134,193,29,158,225,248,152,17,105,217,142,148,155,30,135,233,206,85,40,
223,140,161,137,13,191,230,66,104,65,153,45,15,176,84,187,22];
var SBoxInverse=[82,9,106,213,48,54,165,56,191,64,163,158,129,243,215,251,124,
227,57,130,155,47,255,135,52,142,67,68,196,222,233,203,84,123,148,50,166,194,35,
61,238,76,149,11,66,250,195,78,8,46,161,102,40,217,36,178,118,91,162,73,109,139,
209,37,114,248,246,100,134,104,152,22,212,164,92,204,93,101,182,146,108,112,72,
80,253,237,185,218,94,21,70,87,167,141,157,132,144,216,171,0,140,188,211,10,247,
228,88,5,184,179,69,6,208,44,30,143,202,63,15,2,193,175,189,3,1,19,138,107,58,
145,17,65,79,103,220,234,151,242,207,206,240,180,230,115,150,172,116,34,231,173,
53,133,226,249,55,232,28,117,223,110,71,241,26,113,29,41,197,137,111,183,98,14,
170,24,190,27,252,86,62,75,198,210,121,32,154,219,192,254,120,205,90,244,31,221,
168,51,136,7,199,49,177,18,16,89,39,128,236,95,96,81,127,169,25,181,74,13,45,229,
122,159,147,201,156,239,160,224,59,77,174,42,245,176,200,235,187,60,131,83,153,
97,23,43,4,126,186,119,214,38,225,105,20,99,85,33,12,125];
function cyclicShiftLeft(theArray,positions){var temp=theArray.slice(0,positions)
;theArray=theArray.slice(positions).concat(temp);return theArray;}
var Nk=keySizeInBits/32;var Nb=blockSizeInBits/32;var Nr=roundsArray[Nk][Nb];
function xtime(poly){poly<<=1;return((poly&0x100)?(poly ^ 0x11B):(poly));}
function mult_GF256(x,y){var bit,result=0;for(bit=1;bit<256;bit*=2,y=xtime(y))
{if(x&bit)result ^=y;}return result;}function byteSub(state,direction){var S;
if(direction=="encrypt")S=SBox;else S=SBoxInverse;for(var i=0;i<4;i++)for(var j=0;
j<Nb;j++)state[i][j]=S[state[i][j]];}function shiftRow(state,direction)
{for(var i=1;i<4;i++)if(direction=="encrypt")state[i]=cyclicShiftLeft(state[i],
shiftOffsets[Nb][i]);else state[i]=cyclicShiftLeft(state[i],
Nb-shiftOffsets[Nb][i]);}function mixColumn(state,direction){var b=[];
for(var j=0;j<Nb;j++){for(var i=0;i<4;i++){if(direction=="encrypt")
b[i]=mult_GF256(state[i][j],2)^ mult_GF256(state[(i+1)%4][j],3)^ state[(i+2)
%4][j]^ state[(i+3)%4][j];else b[i]=mult_GF256(state[i][j],0xE)
^ mult_GF256(state[(i+1)%4][j],0xB)^ mult_GF256(state[(i+2)%4][j],0xD)
^ mult_GF256(state[(i+3)%4][j],9);}for(var i=0;i<4;i++)state[i][j]=b[i];}}
function addRoundKey(state,roundKey){for(var j=0;j<Nb;j++)
{state[0][j]^=(roundKey[j]&0xFF);state[1][j]^=((roundKey[j]>>8)&0xFF);
state[2][j]^=((roundKey[j]>>16)&0xFF);state[3][j]^=((roundKey[j]>>24)&0xFF);}}
function keyExpansion(key){var expandedKey=new Array();var temp;
Nk=keySizeInBits/32;Nb=blockSizeInBits/32;Nr=roundsArray[Nk][Nb];for(var j=0;
j<Nk;j++)expandedKey[j]=(key[4*j])|(key[4*j+1]<<8)|(key[4*j+2]<<16)
|(key[4*j+3]<<24);for(j=Nk;j<Nb*(Nr+1);j++){temp=expandedKey[j-1];if(j%Nk==0)
temp=((SBox[(temp>>8)&0xFF])|(SBox[(temp>>16)&0xFF]<<8)|(SBox[(temp>>24)
&0xFF]<<16)|(SBox[temp&0xFF]<<24))^ Rcon[Math.floor(j/Nk)-1];
else if(Nk>6&&j%Nk==4)temp=(SBox[(temp>>24)&0xFF]<<24)|(SBox[(temp>>16)
&0xFF]<<16)|(SBox[(temp>>8)&0xFF]<<8)|(SBox[temp&0xFF]);
expandedKey[j]=expandedKey[j-Nk]^ temp;}return expandedKey;}function Round(state,
roundKey){byteSub(state,"encrypt");shiftRow(state,"encrypt");mixColumn(state,"encrypt");
addRoundKey(state,roundKey);}function InverseRound(state,roundKey)
{addRoundKey(state,roundKey);mixColumn(state,"decrypt");shiftRow(state,"decrypt");
byteSub(state,"decrypt");}function FinalRound(state,roundKey){byteSub(state,"encrypt");
shiftRow(state,"encrypt");addRoundKey(state,roundKey);}
function InverseFinalRound(state,roundKey){addRoundKey(state,roundKey);
shiftRow(state,"decrypt");byteSub(state,"decrypt");}function encrypt(block,expandedKey)
{var i;if(!block||block.length*8!=blockSizeInBits)return;if(!expandedKey)return;
block=packBytes(block);addRoundKey(block,expandedKey);for(i=1;i<Nr;i++)
Round(block,expandedKey.slice(Nb*i,Nb*(i+1)));FinalRound(block,
expandedKey.slice(Nb*Nr));return unpackBytes(block);}function decrypt(block,
expandedKey){var i;if(!block||block.length*8!=blockSizeInBits)return;
if(!expandedKey)return;block=packBytes(block);InverseFinalRound(block,
expandedKey.slice(Nb*Nr));for(i=Nr-1;i>0;i--)InverseRound(block,
expandedKey.slice(Nb*i,Nb*(i+1)));addRoundKey(block,expandedKey);
return unpackBytes(block);}function byteArrayToHex(byteArray){var result="";
if(!byteArray)return;for(var i=0;i<byteArray.length;i++)
result+=((byteArray[i]<16)?"0":"")+byteArray[i].toString(16);
return result;}function hexToByteArray(hexString){var byteArray=[];
if(hexString.length%2)return;if(hexString.indexOf("0x")
==0||hexString.indexOf("0X")==0)hexString=hexString.substring(2);for(var i=0;
i<hexString.length;i+=2)byteArray[Math.floor(i/2)]=parseInt(hexString.slice(i,
i+2),16);return byteArray;}function packBytes(octets){var state=new Array();
if(!octets||octets.length%4)return;state[0]=new Array();state[1]=new Array();
state[2]=new Array();state[3]=new Array();for(var j=0;j<octets.length;j+=4)
{state[0][j/4]=octets[j];state[1][j/4]=octets[j+1];state[2][j/4]=octets[j+2];
state[3][j/4]=octets[j+3];}return state;}function unpackBytes(packed)
{var result=new Array();for(var j=0;j<packed[0].length;j++)
{result[result.length]=packed[0][j];result[result.length]=packed[1][j];
result[result.length]=packed[2][j];result[result.length]=packed[3][j];}
return result;}function formatPlaintext(plaintext){var bpb=blockSizeInBits/8;
var i;if((!((typeof plaintext=="object")&&((typeof(plaintext[0]))=="number")))
&&((typeof plaintext=="string")||plaintext.indexOf))
{plaintext=plaintext.split("");for(i=0;i<plaintext.length;i++)
plaintext[i]=plaintext[i].charCodeAt(0)&0xFF;}i=plaintext.length%bpb;if(i>0)
{plaintext=plaintext.concat(getRandomBytes(bpb-i));}return plaintext;}
function getRandomBytes(howMany){var i,bytes=new Array();for(i=0;i<howMany;i++)
{bytes[i]=prng.nextInt(255);}return bytes;}function rijndaelEncrypt(plaintext,
key,mode){var expandedKey,i,aBlock;var bpb=blockSizeInBits/8;var ct;
if(!plaintext||!key)return;if(key.length*8!=keySizeInBits)return;if(mode=="CBC")
{ct=getRandomBytes(bpb);}else{mode="ECB";ct=new Array();}
plaintext=formatPlaintext(plaintext);expandedKey=keyExpansion(key);
for(var block=0;block<plaintext.length/bpb;block++)
{aBlock=plaintext.slice(block*bpb,(block+1)*bpb);if(mode=="CBC"){for(var i=0;
i<bpb;i++){aBlock[i]^=ct[(block*bpb)+i];}}ct=ct.concat(encrypt(aBlock,
expandedKey));}return ct;}function rijndaelDecrypt(ciphertext,key,mode)
{var expandedKey;var bpb=blockSizeInBits/8;var pt=new Array();var aBlock;
var block;if(!ciphertext||!key||typeof ciphertext=="string")return;
if(key.length*8!=keySizeInBits)return;if(!mode){mode="ECB";}
expandedKey=keyExpansion(key);for(block=(ciphertext.length/bpb)-1;block>0;
block--){aBlock=decrypt(ciphertext.slice(block*bpb,(block+1)*bpb),expandedKey);
if(mode=="CBC")for(var i=0;i<bpb;i++)pt[(block-1)
*bpb+i]=aBlock[i]^ ciphertext[(block-1)*bpb+i];else pt=aBlock.concat(pt);}
if(mode=="ECB")pt=decrypt(ciphertext.slice(0,bpb),expandedKey).concat(pt);
return pt;}
/* ]]> */
</script>
<script language="JavaScript" type="text/javascript" >
/* <![CDATA[ */
var entropyData=new Array();var edlen=0;addEntropyTime();ce();
function addEntropyByte(b){entropyData[edlen++]=b;}function ce()
{addEntropyByte(Math.floor((((new Date).getMilliseconds())*255)/999));}
function addEntropy32(w){var i;for(i=0;i<4;i++){addEntropyByte(w&0xFF);w>>=8;}}
function addEntropyTime(){addEntropy32((new Date()).getTime());}
var mouseMotionCollect=0;var oldMoveHandler;function mouseMotionEntropy(maxsamp)
{if(mouseMotionCollect<=0){mouseMotionCollect=maxsamp;
if((document.implementation.hasFeature("Events","2.0"))&&document.addEventListener)
{document.addEventListener("mousemove",mouseMoveEntropy,false);}
else{if(document.attachEvent){document.attachEvent("onmousemove",mouseMoveEntropy);}
else{oldMoveHandler=document.onmousemove;document.onmousemove=mouseMoveEntropy;}}
}}var mouseEntropyTime=0;function mouseMoveEntropy(e){if(!e){e=window.event;}
if(mouseMotionCollect>0){if(mouseEntropyTime--<=0){addEntropyByte(e.screenX&0xFF)
;addEntropyByte(e.screenY&0xFF);ce();mouseMotionCollect--;
mouseEntropyTime=(entropyData[edlen-3]^ entropyData[edlen-2]^ entropyData[edlen-1])
%19;}if(mouseMotionCollect<=0){if(document.removeEventListener)
{document.removeEventListener("mousemove",mouseMoveEntropy,false);}
else if(document.detachEvent){document.detachEvent("onmousemove",mouseMoveEntropy);}
else{document.onmousemove=oldMoveHandler;}}}}function keyFromEntropy(){var i,
k=new Array(32);if(edlen==0){alert("Blooie!  Entropy vector void at call to keyFromEntropy.");}md5_init();for(i=0;i<edlen;i+=2)
{md5_update(entropyData[i]);}md5_finish();for(i=0;i<16;i++){k[i]=digestBits[i];}
md5_init();for(i=1;i<edlen;i+=2){md5_update(entropyData[i]);}md5_finish();
for(i=0;i<16;i++){k[i+16]=digestBits[i];}return k;}
/* ]]> */
</script>
<script language="JavaScript" type="text/javascript" >
/* <![CDATA[ */
function AESprng(seed){this.key=new Array();this.key=seed;
this.itext=hexToByteArray("9F489613248148F9C27945C6AE62EECA3E3367BB14064E4E6DC67A9F28AB3BD1");this.nbytes=0;this.next=AESprng_next;
this.nextbits=AESprng_nextbits;this.nextInt=AESprng_nextInt;
this.round=AESprng_round;bsb=blockSizeInBits;blockSizeInBits=256;var i,ct;
for(i=0;i<3;i++){this.key=rijndaelEncrypt(this.itext,this.key,"ECB");}
var n=1+(this.key[3]&2)+(this.key[9]&1);for(i=0;i<n;i++)
{this.key=rijndaelEncrypt(this.itext,this.key,"ECB");}blockSizeInBits=bsb;}
function AESprng_round(){bsb=blockSizeInBits;blockSizeInBits=256;
this.key=rijndaelEncrypt(this.itext,this.key,"ECB");this.nbytes=32;
blockSizeInBits=bsb;}function AESprng_next(){if(this.nbytes<=0){this.round();}
return(this.key[--this.nbytes]);}function AESprng_nextbits(n){var i,w=0,
nbytes=Math.floor((n+7)/8);for(i=0;i<nbytes;i++){w=(w<<8)|this.next();}
return w&((1<<n)-1);}function AESprng_nextInt(n){var p=1,nb=0;while(n>=p){p<<=1;
nb++;}p--;while(true){var v=this.nextbits(nb)&p;if(v<=n){return v;}}}
/* ]]> */
</script>
<script language="JavaScript" type="text/javascript" >
/* <![CDATA[ */
function uGen(old,a,q,r,m){var t;t=Math.floor(old/q);t=a*(old-(t*q))-(t*r);
return Math.round((t<0)?(t+m):t);}function LEnext(){var i;
this.gen1=uGen(this.gen1,40014,53668,12211,2147483563);this.gen2=uGen(this.gen2,
40692,52774,3791,2147483399);i=Math.floor(this.state/67108862);
this.state=Math.round((this.shuffle[i]+this.gen2)%2147483563);
this.shuffle[i]=this.gen1;return this.state;}function LEnint(n){var p=1;
while(n>=p){p<<=1;}p--;while(true){var v=this.next()&p;if(v<=n){return v;}}}
function LEcuyer(s){var i;this.shuffle=new Array(32);
this.gen1=this.gen2=(s&0x7FFFFFFF);for(i=0;i<19;i++){this.gen1=uGen(this.gen1,
40014,53668,12211,2147483563);}for(i=0;i<32;i++){this.gen1=uGen(this.gen1,40014,
53668,12211,2147483563);this.shuffle[31-i]=this.gen1;}this.state=this.shuffle[0];
this.next=LEnext;this.nextInt=LEnint;}
/* ]]> */
</script>
<script language="JavaScript" type="text/javascript" >
/* <![CDATA[ */
function array(n){for(i=0;i<n;i++){this[i]=0;}this.length=n;}function integer(n)
{return n%(0xffffffff+1);}function shr(a,b){a=integer(a);b=integer(b);
if(a-0x80000000>=0){a=a%0x80000000;a>>=b;a+=0x40000000>>(b-1);}else{a>>=b;}
return a;}function shl1(a){a=a%0x80000000;if(a&0x40000000==0x40000000)
{a-=0x40000000;a*=2;a+=0x80000000;}else{a*=2;}return a;}function shl(a,b)
{a=integer(a);b=integer(b);for(var i=0;i<b;i++){a=shl1(a);}return a;}
function and(a,b){a=integer(a);b=integer(b);var t1=a-0x80000000;
var t2=b-0x80000000;if(t1>=0){if(t2>=0){return((t1&t2)+0x80000000);}
else{return(t1&b);}}else{if(t2>=0){return(a&t2);}else{return(a&b);}}}
function or(a,b){a=integer(a);b=integer(b);var t1=a-0x80000000;
var t2=b-0x80000000;if(t1>=0){if(t2>=0){return((t1|t2)+0x80000000);}
else{return((t1|b)+0x80000000);}}else{if(t2>=0){return((a|t2)+0x80000000);}
else{return(a|b);}}}function xor(a,b){a=integer(a);b=integer(b);
var t1=a-0x80000000;var t2=b-0x80000000;if(t1>=0){if(t2>=0){return(t1 ^ t2);}
else{return((t1 ^ b)+0x80000000);}}else{if(t2>=0){return((a ^ t2)+0x80000000);}
else{return(a ^ b);}}}function not(a){a=integer(a);return 0xffffffff-a;}
var state=new array(4);var count=new array(2);count[0]=0;count[1]=0;
var buffer=new array(64);var transformBuffer=new array(16);
var digestBits=new array(16);var S11=7;var S12=12;var S13=17;var S14=22;
var S21=5;var S22=9;var S23=14;var S24=20;var S31=4;var S32=11;var S33=16;
var S34=23;var S41=6;var S42=10;var S43=15;var S44=21;function F(x,y,z)
{return or(and(x,y),and(not(x),z));}function G(x,y,z){return or(and(x,z),and(y,
not(z)));}function H(x,y,z){return xor(xor(x,y),z);}function I(x,y,z)
{return xor(y,or(x,not(z)));}function rotateLeft(a,n){return or(shl(a,n),(shr(a,
(32-n))));}function FF(a,b,c,d,x,s,ac){a=a+F(b,c,d)+x+ac;a=rotateLeft(a,s);a=a+b;
return a;}function GG(a,b,c,d,x,s,ac){a=a+G(b,c,d)+x+ac;a=rotateLeft(a,s);a=a+b;
return a;}function HH(a,b,c,d,x,s,ac){a=a+H(b,c,d)+x+ac;a=rotateLeft(a,s);a=a+b;
return a;}function II(a,b,c,d,x,s,ac){a=a+I(b,c,d)+x+ac;a=rotateLeft(a,s);a=a+b;
return a;}function transform(buf,offset){var a=0,b=0,c=0,d=0;
var x=transformBuffer;a=state[0];b=state[1];c=state[2];d=state[3];for(i=0;i<16;
i++){x[i]=and(buf[i*4+offset],0xFF);for(j=1;j<4;j++)
{x[i]+=shl(and(buf[i*4+j+offset],0xFF),j*8);}}a=FF(a,b,c,d,x[0],S11,0xd76aa478);
d=FF(d,a,b,c,x[1],S12,0xe8c7b756);c=FF(c,d,a,b,x[2],S13,0x242070db);b=FF(b,c,d,a,
x[3],S14,0xc1bdceee);a=FF(a,b,c,d,x[4],S11,0xf57c0faf);d=FF(d,a,b,c,x[5],S12,
0x4787c62a);c=FF(c,d,a,b,x[6],S13,0xa8304613);b=FF(b,c,d,a,x[7],S14,0xfd469501);
a=FF(a,b,c,d,x[8],S11,0x698098d8);d=FF(d,a,b,c,x[9],S12,0x8b44f7af);c=FF(c,d,a,b,
x[10],S13,0xffff5bb1);b=FF(b,c,d,a,x[11],S14,0x895cd7be);a=FF(a,b,c,d,x[12],S11,
0x6b901122);d=FF(d,a,b,c,x[13],S12,0xfd987193);c=FF(c,d,a,b,x[14],S13,0xa679438e)
;b=FF(b,c,d,a,x[15],S14,0x49b40821);a=GG(a,b,c,d,x[1],S21,0xf61e2562);d=GG(d,a,b,
c,x[6],S22,0xc040b340);c=GG(c,d,a,b,x[11],S23,0x265e5a51);b=GG(b,c,d,a,x[0],S24,
0xe9b6c7aa);a=GG(a,b,c,d,x[5],S21,0xd62f105d);d=GG(d,a,b,c,x[10],S22,0x2441453);
c=GG(c,d,a,b,x[15],S23,0xd8a1e681);b=GG(b,c,d,a,x[4],S24,0xe7d3fbc8);a=GG(a,b,c,
d,x[9],S21,0x21e1cde6);d=GG(d,a,b,c,x[14],S22,0xc33707d6);c=GG(c,d,a,b,x[3],S23,
0xf4d50d87);b=GG(b,c,d,a,x[8],S24,0x455a14ed);a=GG(a,b,c,d,x[13],S21,0xa9e3e905);
d=GG(d,a,b,c,x[2],S22,0xfcefa3f8);c=GG(c,d,a,b,x[7],S23,0x676f02d9);b=GG(b,c,d,a,
x[12],S24,0x8d2a4c8a);a=HH(a,b,c,d,x[5],S31,0xfffa3942);d=HH(d,a,b,c,x[8],S32,
0x8771f681);c=HH(c,d,a,b,x[11],S33,0x6d9d6122);b=HH(b,c,d,a,x[14],S34,0xfde5380c)
;a=HH(a,b,c,d,x[1],S31,0xa4beea44);d=HH(d,a,b,c,x[4],S32,0x4bdecfa9);c=HH(c,d,a,
b,x[7],S33,0xf6bb4b60);b=HH(b,c,d,a,x[10],S34,0xbebfbc70);a=HH(a,b,c,d,x[13],S31,
0x289b7ec6);d=HH(d,a,b,c,x[0],S32,0xeaa127fa);c=HH(c,d,a,b,x[3],S33,0xd4ef3085);
b=HH(b,c,d,a,x[6],S34,0x4881d05);a=HH(a,b,c,d,x[9],S31,0xd9d4d039);d=HH(d,a,b,c,
x[12],S32,0xe6db99e5);c=HH(c,d,a,b,x[15],S33,0x1fa27cf8);b=HH(b,c,d,a,x[2],S34,
0xc4ac5665);a=II(a,b,c,d,x[0],S41,0xf4292244);d=II(d,a,b,c,x[7],S42,0x432aff97);
c=II(c,d,a,b,x[14],S43,0xab9423a7);b=II(b,c,d,a,x[5],S44,0xfc93a039);a=II(a,b,c,
d,x[12],S41,0x655b59c3);d=II(d,a,b,c,x[3],S42,0x8f0ccc92);c=II(c,d,a,b,x[10],S43,
0xffeff47d);b=II(b,c,d,a,x[1],S44,0x85845dd1);a=II(a,b,c,d,x[8],S41,0x6fa87e4f);
d=II(d,a,b,c,x[15],S42,0xfe2ce6e0);c=II(c,d,a,b,x[6],S43,0xa3014314);b=II(b,c,d,
a,x[13],S44,0x4e0811a1);a=II(a,b,c,d,x[4],S41,0xf7537e82);d=II(d,a,b,c,x[11],S42,
0xbd3af235);c=II(c,d,a,b,x[2],S43,0x2ad7d2bb);b=II(b,c,d,a,x[9],S44,0xeb86d391);
state[0]+=a;state[1]+=b;state[2]+=c;state[3]+=d;}function md5_init()
{count[0]=count[1]=0;state[0]=0x67452301;state[1]=0xefcdab89;state[2]=0x98badcfe;
state[3]=0x10325476;for(i=0;i<digestBits.length;i++){digestBits[i]=0;}}
function md5_update(b){var index,i;index=and(shr(count[0],3),0x3F);
if(count[0]<0xFFFFFFFF-7){count[0]+=8;}else{count[1]++;count[0]-=0xFFFFFFFF+1;
count[0]+=8;}buffer[index]=and(b,0xff);if(index>=63){transform(buffer,0);}}
function md5_finish(){var bits=new array(8);var padding;var i=0,index=0,padLen=0;
for(i=0;i<4;i++){bits[i]=and(shr(count[0],(i*8)),0xFF);}for(i=0;i<4;i++)
{bits[i+4]=and(shr(count[1],(i*8)),0xFF);}index=and(shr(count[0],3),0x3F);
padLen=(index<56)?(56-index):(120-index);padding=new array(64);padding[0]=0x80;
for(i=0;i<padLen;i++){md5_update(padding[i]);}for(i=0;i<8;i++)
{md5_update(bits[i]);}for(i=0;i<4;i++){for(j=0;j<4;j++)
{digestBits[i*4+j]=and(shr(state[i],(j*8)),0xFF);}}}
/* ]]> */
</script>
<script language="JavaScript" type="text/javascript" >
/* <![CDATA[ */
var maxLineLength=64;var hexSentinel="?HX?",hexEndSentinel="?H";
function armour_hex(b){var h=hexSentinel+byteArrayToHex(b)+hexEndSentinel;
var t="";while(h.length>maxLineLength){t+=h.substring(0,maxLineLength)+"\n";
h=h.substring(maxLineLength,h.length);}t+=h+"\n";return t;}
function disarm_hex(s){var hexDigits="0123456789abcdefABCDEF";var hs="",i;
if((i=s.indexOf(hexSentinel))>=0){s=s.substring(i+hexSentinel.length,s.length);}
if((i=s.indexOf(hexEndSentinel))>=0){s=s.substring(0,i);}for(i=0;i<s.length;i++)
{var c=s.charAt(i);if(hexDigits.indexOf(c)>=0){hs+=c;}}return hexToByteArray(hs);
}var acgcl,acgt,acgg;function armour_cg_outgroup(){if(acgcl.length>maxLineLength)
{acgt+=acgcl+"\n";acgcl="";}if(acgcl.length>0){acgcl+=" ";}acgcl+=acgg;
acgg="";}function armour_cg_outletter(l){if(acgg.length>=5)
{armour_cg_outgroup();}acgg+=l;}var codegroupSentinel="ZZZZZ";
function armour_codegroup(b){var charBase=("A").charCodeAt(0);
acgcl=codegroupSentinel;acgt="";acgg="";var cgrng=new LEcuyer(0xbadf00d);
for(i=0;i<b.length;i++){var r=cgrng.nextInt(23);
armour_cg_outletter(String.fromCharCode(charBase+((((b[i]>>4)&0xF))+r)%24));
r=cgrng.nextInt(23);
armour_cg_outletter(String.fromCharCode(charBase+((((b[i]&0xF))+r)%24)));}
delete cgrng;while(acgg.length<5){armour_cg_outletter("Z");}
armour_cg_outgroup();acgg="YYYYY";armour_cg_outgroup();acgt+=acgcl+"\n";
return acgt;}var dcgs,dcgi;function disarm_cg_insig(){while(dcgi<dcgs.length)
{var c=dcgs.charAt(dcgi++).toUpperCase();if((c>="A")&&(c<="Z")){return c;}}
return "";}function disarm_codegroup(s){var b=new Array();var nz=0,ba,bal=0,
c;dcgs=s;dcgi=0;while(nz<5){c=disarm_cg_insig();if(c=="Z"){nz++;}
else if(c==""){nz=0;break;}else{nz=0;}}if(nz==0){alert("No codegroup starting symbol found in message.");return "";
}var charBase=("A").charCodeAt(0);var cgrng=new LEcuyer(0xbadf00d);for(nz=0;
nz<2;){c=disarm_cg_insig();if((c=="Y")||(c=="")){break;}else if(c!="Z")
{var r=cgrng.nextInt(23);var n=c.charCodeAt(0)-charBase;n=(n+(24-r))%24;if(nz==0)
{ba=(n<<4);nz++;}else{ba|=n;b[bal++]=ba;nz=0;}}}delete cgrng;var kbo="  Attempting decoding with data received.";
if(nz!=0){alert("Codegroup data truncated."+kbo);}else{if(c=="Y"){nz=1;while(nz<5)
{c=disarm_cg_insig();if(c!="Y"){break;}nz++;}if(nz!=5){alert("Codegroup end group incomplete."+kbo);}}
else{alert("Codegroup end group missing."+kbo);}}return b;}var base64code="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",base64sent="?b64",
base64esent="?64b",base64addsent=true;function armour_base64(b){var b64t="";
var b64l=base64addsent?base64sent:"";var i;for(i=0;i<=b.length-3;i+=3)
{if((b64l.length+4)>maxLineLength){b64t+=b64l+"\n";b64l="";}
b64l+=base64code.charAt(b[i]>>2);b64l+=base64code.charAt(((b[i]&3)<<4)
|(b[i+1]>>4));b64l+=base64code.charAt(((b[i+1]&0xF)<<2)|(b[i+2]>>6));
b64l+=base64code.charAt(b[i+2]&0x3F);}if((b.length-i)==1)
{b64l+=base64code.charAt(b[i]>>2);b64l+=base64code.charAt(((b[i]&3)<<4));
b64l+="==";}else if((b.length-i)==2){b64l+=base64code.charAt(b[i]>>2);
b64l+=base64code.charAt(((b[i]&3)<<4)|(b[i+1]>>4));
b64l+=base64code.charAt(((b[i+1]&0xF)<<2));b64l+="=";}if((b64l.length+4)
>maxLineLength){b64t+=b64l+"\n";b64l="";}if(base64addsent)
{b64l+=base64esent;}b64t+=b64l+"\n";return b64t;}function disarm_base64(s)
{var b=new Array();var i=0,j,c,shortgroup=0,n=0;var d=new Array();
if((j=s.indexOf(base64sent))>=0){s=s.substring(j+base64sent.length,s.length);}
if((j=s.indexOf(base64esent))>=0){s=s.substring(0,j);}while(i<s.length)
{if(base64code.indexOf(s.charAt(i))!=-1){break;}i++;}while(i<s.length){for(j=0;
j<4;){if(i>=s.length){if(j>0){alert("Base64 cipher text truncated.");return b;}break;}
c=base64code.indexOf(s.charAt(i));if(c>=0){d[j++]=c;}else if(s.charAt(i)=="=")
{d[j++]=0;shortgroup++;}else if(s.substring(i,i+base64esent.length)==base64esent)
{i=s.length;continue;}else{}i++;}if(j==4){b[n++]=((d[0]<<2)|(d[1]>>4))&0xFF;
if(shortgroup<2){b[n++]=((d[1]<<4)|(d[2]>>2))&0xFF;if(shortgroup<1)
{b[n++]=((d[2]<<6)|d[3])&0xFF;}}}}return b;}
/* ]]> */
</script>
<script language="JavaScript" type="text/javascript" >
/* <![CDATA[ */
function unicode_to_utf8(s){var utf8="";for(var n=0;n<s.length;n++)
{var c=s.charCodeAt(n);if(c<=0x7F){utf8+=String.fromCharCode(c);}
else if((c>=0x80)&&(c<=0x7FF)){utf8+=String.fromCharCode((c>>6)|0xC0);
utf8+=String.fromCharCode((c&0x3F)|0x80);}else{utf8+=String.fromCharCode((c>>12)
|0xE0);utf8+=String.fromCharCode(((c>>6)&0x3F)|0x80);
utf8+=String.fromCharCode((c&0x3F)|0x80);}}return utf8;}
function utf8_to_unicode(utf8){var s="",i=0,b1,b2,b2;while(i<utf8.length)
{b1=utf8.charCodeAt(i);if(b1<0x80){s+=String.fromCharCode(b1);i++;}
else if((b1>=0xC0)&&(b1<0xE0)){b2=utf8.charCodeAt(i+1);
s+=String.fromCharCode(((b1&0x1F)<<6)|(b2&0x3F));i+=2;}
else{b2=utf8.charCodeAt(i+1);b3=utf8.charCodeAt(i+2);
s+=String.fromCharCode(((b1&0xF)<<12)|((b2&0x3F)<<6)|(b3&0x3F));i+=3;}}return s;}
function encode_utf8(s){var i,necessary=false;for(i=0;i<s.length;i++)
{if((s.charCodeAt(i)==0x9D)||(s.charCodeAt(i)>0xFF)){necessary=true;break;}}
if(!necessary){return s;}return String.fromCharCode(0x9D)+unicode_to_utf8(s);}
function decode_utf8(s){if((s.length>0)&&(s.charCodeAt(0)==0x9D))
{return utf8_to_unicode(s.substring(1));}return s;}
/* ]]> */
</script>
<script language="JavaScript" type="text/javascript" >
/* <![CDATA[ */
var loadTime=(new Date()).getTime();var key;var prng;

function Generate_key(){var i,j,k="";
var i,j,k="";addEntropyTime();var seed=keyFromEntropy();
var prng=new AESprng(seed);var charA=("A")
.charCodeAt(0);for(i=0;i<12;i++){if(i>0){k+="-";}for(j=0;j<5;j++)
{k+=String.fromCharCode(charA+prng.nextInt(25));}}
document.key.text.value=k;delete prng;}


function Encrypt_text(){
	var v,i;
	setKey();
	addEntropyTime();
	prng=new AESprng(keyFromEntropy());
	var plaintext=encode_utf8(document.getElementById('txa').value);
	md5_init();
	for(i=0;i<plaintext.length;i++){md5_update(plaintext.charCodeAt(i));}
	md5_finish();
	var header="";
	for(i=0;i<digestBits.length;i++){header+=String.fromCharCode(digestBits[i]);}
	i=plaintext.length;
	header+=String.fromCharCode(i>>>24);
	header+=String.fromCharCode(i>>>16);
	header+=String.fromCharCode(i>>>8);
	header+=String.fromCharCode(i&0xFF);
	var ct=rijndaelEncrypt(header+plaintext,key,"CBC");
	//var ct=rijndaelEncrypt(header+plaintext,key,"ECB");
	v=armour_codegroup(ct);
	//v=ct;
	delete prng;
	return v;
}

function determineArmourType(s){var kt,pcg,phex,pb64,pmin;
pcg=s.indexOf(codegroupSentinel);phex=s.indexOf(hexSentinel);
pb64=s.indexOf(base64sent);if(pcg==-1){pcg=s.length;}if(phex==-1){phex=s.length;}
if(pb64==-1){pb64=s.length;}pmin=Math.min(pcg,Math.min(phex,pb64));
if(pmin<s.length){if(pmin==pcg){kt=0;}else if(pmin==phex){kt=1;}else{kt=2;}}
else{kt=0;}return kt;}

var error_msg=0;

function Decrypt_text(){
	error_msg=0;
	setKey();
	var ct=new Array(),kt;
	//kt=determineArmourType(document.getElementById('txa').value);
	kt=0;
	//if(kt==0){ct=disarm_codegroup(document.getElementById('txa').value);}
	//else if(kt==1){ct=disarm_hex(document.getElementById('txa').value);}
	//else if(kt==2){ct=disarm_base64(document.getElementById('txa').value);}
	ct=disarm_codegroup(document.getElementById('txa').value);
	var result=rijndaelDecrypt(ct,key,"CBC");
	var header=result.slice(0,20);
	result=result.slice(20);
	var dl=(header[16]<<24)|(header[17]<<16)|(header[18]<<8)|header[19];
	if((dl<0)||(dl>result.length)){
		// alert("El texto (longitud "+result.length+") ha sido truncado.  Se esperaban "+dl+" caracteres.");
		error_msg = 1;
		dl=result.length;
	}
	var i,plaintext="";
	md5_init();
	for(i=0;i<dl;i++){
		plaintext+=String.fromCharCode(result[i]);
		md5_update(result[i]);
	}
	md5_finish();
	for(i=0;i<digestBits.length;i++){
		if(digestBits[i]!=header[i]){
			// alert("El texto está corrupto.  El Checksum del texto desencriptado no coincide.");
			error_msg = 1;
			break;
		}
	}
	if (error_msg==1){
		alert('Incorrect encryption key.');
		return document.getElementById('txa').value;
	}else{
		return decode_utf8(plaintext);
	}
}

function setKey(){
	var s=encode_utf8(document.getElementById('key').value);
	var i,kmd5e,kmd5o;
	if(s.length==1){s+=s;}
	md5_init();
	for(i=0;i<s.length;i+=2){	md5_update(s.charCodeAt(i));}
	md5_finish();
	kmd5e=byteArrayToHex(digestBits);
	md5_init();
	for(i=1;i<s.length;i+=2){md5_update(s.charCodeAt(i));}
	md5_finish();
	kmd5o=byteArrayToHex(digestBits);
	var hs=kmd5e+kmd5o;
	key=hexToByteArray(hs);
	hs=byteArrayToHex(key);
}

/* ]]> */
</script>
<script>
	var last_keyCode = '';
	function getKeyCode(e){
		e= (window.event)? event : e;
		intKey = (e.keyCode)? e.keyCode: e.charCode;
		last_keyCode = intKey;
		return intKey;
	}
</script>

</head><body>

<form id='form1' method='post' action="open.php?file=<?= urlencode($file) ?>" autocomplete="off">
<input type='hidden' id='op' name='op' value='save' />
<h3 class="a_c"><?= str_replace(array('-','_'),' ',$file) ?></h3>
<table class='tb_main' cellpadding='0' cellspacing='0'>
    <tr>
        <td style='color:#fff;'>
            <div id="menu_encrypted">
                <input type='password' id='key' value='' placeholder=" *** write your encryption key here *** " class="key"
				 	onkeypress="if(getKeyCode(event)==13){js_decrypt();return false;}" autocomplete="off" />
                <a href='#' class='a_bt' id='bt_decrypt' onclick='js_decrypt();'>Decrypt</a>
				<a href='index.php' class='a_bt'>Menu</a>
            </div>
            <div id="menu_decrypted" style="display:none;">
                <a href='#' class='a_bt' id='bt_close' onclick='js_close();'>Close</a>
                <a href='#' class='a_bt' id='bt_save' onclick='js_save();'>Save</a>
                <a href='#' class='a_bt' id='bt_change' onclick='js_change();'>Change key</a>
				<a href='#' class='a_bt' id='bt_edit' onclick='js_2FA_edit();' style='display:none;'>Edit</a>
				<a href='#' class='a_bt' id='bt_regenerate' onclick='js_2FA_regenerate();' style='display:none;'><span>R</span>egenerate</a>
            </div>
            <div id="menu_change_key" style="display:none;">
                 New key: <input type='password' id='key1' value='' placeholder=" *** write your encryption key here *** " class="key" autocomplete="off" />
                <br />
                Confirm new key: <input type='password' id='key2' value='' placeholder=" *** write your encryption key here *** " class="key" autocomplete="off" />
                <br />
                <a href='#' class='a_bt' id='bt_save_change' onclick='js_save_change();'>Save with new key</a>
                <a href='#' class='a_bt' id='bt_close' onclick='js_cancel_change_key();'>Cancel</a>
            </div>
        </td>
    </tr>
    <tr>
        <td>
			<div id='totps' style='display:none;'>
				<!-- <a href="#" data-sk="GHMXWADIUSUTXXAG" data-label="IM">IM: <b>123456</b></a> -->
			</div>
            <textarea id='txa' name='txa' autocomplete="off"><?php

                    $ret="";
                    $fp = fopen($file_path,"r");
                    while($linea = fgets($fp, 10000)) $ret .= $linea;
                    fclose($fp);
                    echo $ret;

             ?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <div style='text-align:center;' id='messages_div'>
                <?php if (!empty($msg)){ echo $msg; }else{ ?>
                Last save on <?php echo date ("<\b>F d Y</\b> H:i:s.", filemtime($file_path)); ?>
                <?php } ?>
            </div>
        </td>
    </tr>
</table>
</form>
    <p id="signature"><a href="https://github.com/caos30/php_srrJSEncrypt" target="_blank">php_srrJSEncrypt - <?= $version ?></a> (C) 2015-2020 GPL v2 license</p>




<script>
var data_state = 'encrypted';
var obj_messages_div = document.getElementById('messages_div');
var encrypted_data = document.getElementById('txa').value;
function js_decrypt(b_edit){
	if (document.getElementById('key').value=='') alert('The encryption key can not be empty.');
        document.getElementById('txa').value = Decrypt_text();
        if (error_msg==0){
                obj_messages_div.innerHTML = '<span class=\'green\'><b>Decryption</b> performed successfully.</span>';
                document.getElementById('menu_encrypted').style.display = "none";
                document.getElementById('menu_decrypted').style.display = "inline-block";
                document.getElementById('txa').className = 'txa_decrypted';
                document.getElementById('txa').focus();
                data_state = 'decrypted';
				if (b_edit=='1'){
					document.getElementById('totps').style = 'display:none;';
				}else{
					js_render_totps();
				}
        }else{
                obj_messages_div.innerHTML = '<span class=\'red\'><b>Wrong encryption key</b>. Try again.</span>';
                document.getElementById('key').focus();
        }
}

function js_close(){
		if (data_state === 'decrypted'){
			var coded = Encrypt_text();
	        document.getElementById('txa').value = coded;
			encrypted_data = coded;
			obj_messages_div.innerHTML = '<span class=\'green\'>Content successfully <b>encrypted</b> again.</span>';
	        data_state = 'encrypted';
		}
        document.getElementById('txa').className = '';
        document.getElementById('menu_change_key').style.display = "none";
        document.getElementById('menu_decrypted').style.display = "none";
        document.getElementById('menu_encrypted').style.display = "inline-block";
        document.getElementById('key').value = '';
        document.getElementById('key').focus();
		document.getElementById('totps').innerHTML = '';
		document.getElementById('totps').style = 'display:none;';
}

function js_save(){
        var coded = Encrypt_text();
        document.getElementById('txa').value = coded;
        document.getElementById('txa').className = '';
        obj_messages_div.innerHTML = '<span class=\'green\'><b>Encryption</b> performed successfully.</span>';
        data_state = 'encrypted';
        document.getElementById('form1').submit();
}

function js_change(){
    document.getElementById('menu_encrypted').style.display = "none";
    document.getElementById('menu_decrypted').style.display = "none";
    document.getElementById('menu_change_key').style.display = "inline-block";
    document.getElementById('key1').focus();
}

function js_cancel_change_key(){
    document.getElementById('menu_encrypted').style.display = "none";
    document.getElementById('menu_decrypted').style.display = "inline-block";
    document.getElementById('menu_change_key').style.display = "none";
}


function js_save_change(){
    var key1 = document.getElementById('key1').value;
    var key2 = document.getElementById('key2').value;

    if (key1=='') return;

    if (key1 != key2){
        alert("Please rewrite both keys because they don't match.");
        document.getElementById('key1').value = '';
        document.getElementById('key2').value = '';
        document.getElementById('key1').focus();
        return;
    }

    document.getElementById('key').value = key1;
    js_save();
}

/* = put cursor/focus on the #key box = */
    document.getElementById('key').focus();

/* = adjust the height of main wrapper to the window height = */
    var h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    document.getElementById('txa').style.height = (parseInt(h,10) - 250) + 'px';

</script>

<!-- 2FA TOTP -->

	<script>
		function _isHidden(object_id) {
			var el = document.getElementById(object_id);
			var style = window.getComputedStyle(el);
			return (style.display === 'none')
		}
		// == detect if the a numeric (1-9) keyboard is pressed (normal or numeric keyboard)
		// == to trigger the opening of the corresponding file
		document.onkeyup = function(e) {
			
			if ( _isHidden('totps') || _isHidden('bt_regenerate')) return;
			
			var key = e.which || e.keyCode;
			
			if (key==82){ // R -> Regenerate
				js_2FA_regenerate();
			}
			
			return;
		};
	</script>

<script src="lib/jsSHA-master/sha.js"></script>
<!--<script src="lib/totp.js"></script>-->
<script>
	TOTP = function() {

	    var dec2hex = function(s) {
	        return (s < 15.5 ? "0" : "") + Math.round(s).toString(16);
	    };

	    var hex2dec = function(s) {
	        return parseInt(s, 16);
	    };

	    var leftpad = function(s, l, p) {
	        if(l + 1 >= s.length) {
	            s = Array(l + 1 - s.length).join(p) + s;
	        }
	        return s;
	    };

	    var base32tohex = function(base32) {
	        var base32chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";
	        var bits = "";
	        var hex = "";
	        for(var i = 0; i < base32.length; i++) {
	            var val = base32chars.indexOf(base32.charAt(i).toUpperCase());
	            bits += leftpad(val.toString(2), 5, '0');
	        }
	        for(var i = 0; i + 4 <= bits.length; i+=4) {
	            var chunk = bits.substr(i, 4);
	            hex = hex + parseInt(chunk, 2).toString(16) ;
	        }
	        return hex;
	    };

		this.getOTP = function(secret) {
	        try {
	            var epoch = Math.round(new Date().getTime() / 1000.0);
	            var time = leftpad(dec2hex(Math.floor(epoch / 30)), 16, "0");

				var shaObj = new jsSHA("SHA-1", "HEX");
			    shaObj.setHMACKey(base32tohex(secret), "HEX");
			    shaObj.update(time);
			    var hmac = shaObj.getHMAC("HEX");

	            var offset = hex2dec(hmac.substring(hmac.length - 1));
	            var otp = (hex2dec(hmac.substr(offset * 2, 8)) & hex2dec("7fffffff")) + "";
	            otp = (otp).substr(otp.length - 6, 6);

	        } catch (error) {
	            throw error;
	        }
	        return otp;
	    };

	}

	function js_refresh_totps(){
		var totpsChildren = document.getElementById("totps").children;
		var totpObj = new TOTP();
		for(var i = 0; i < totpsChildren.length; i++) {
			var totpDOM = totpsChildren[i];
			var sk = totpDOM.getAttribute('data-sk');
			var label = totpDOM.getAttribute('data-label');
			var totp = totpObj.getOTP(sk);
			totpDOM.innerHTML = label + ': ' + totp;
			totpDOM.setAttribute('data-totp',totp);
		}
	}

	function js_render_totps(){
		// = check if decrypted data contain a javascript object
			var decrypted_str = document.getElementById('txa').value;
			try{
				eval('var jsonObj = ' + decrypted_str + ';');
			}catch(e){
				var jsonObj = '';
			}
			if (typeof jsonObj !== 'object') return;

		// = iterate through elements of this object and extract possible accounts keys & labels
			var html_totp = '';
			var ii = 0;
			for(account in jsonObj) {
				ii++;
				if (jsonObj[account]['account']!==undefined){
					html_totp += "<a href='#' id='totp-"+ii+"' data-sk='"+(jsonObj[account]['secret']).trim()
								+"' data-label='"+(jsonObj[account]['account']).trim()
								+"' data-totp='' onclick=\"js_copy_totp('"+ii+"');return false;\"></a>";
				}
			}

		// = activate 2FA generators
			if (html_totp!=''){
				document.getElementById('totps').innerHTML = html_totp;
				document.getElementById('totps').style='display:block;';
				document.getElementById('bt_save').style='display:none;';
				document.getElementById('bt_change').style='display:none;';
				document.getElementById('bt_edit').style='display:inline-block;';
				document.getElementById('bt_regenerate').style='display:inline-block;';
				document.getElementById('txa').className = '';
				document.getElementById('txa').value = encrypted_data;
				data_state = 'encrypted';
				js_refresh_totps();
			}
			
		document.getElementById('bt_regenerate').focus();
	}

	function js_2FA_edit(){
		document.getElementById('bt_edit').style='display:none;';
		document.getElementById('bt_regenerate').style='display:none;';
		document.getElementById('bt_save').style='display:inline-block;';
		document.getElementById('bt_change').style='display:inline-block;';
		document.getElementById('txa').value = encrypted_data;
		js_decrypt('1');
	}

	function js_2FA_regenerate(){
		document.getElementById('totps').style = 'background:orange;';
		js_refresh_totps();
		setTimeout(function(){document.getElementById('totps').style = 'background:black;'},300);
		
		/* == return the focus to the last copied button or to the REGENERATE button == */
		var focused_bt_id = js_which_totp_bt_is_focused();
		if (focused_bt_id!=''){
			document.getElementById(focused_bt_id).focus();
		}else{
			document.getElementById('bt_regenerate').focus();
		}
	}
	
	function js_which_totp_bt_is_focused(){
		var focused_bt_id = '';
		var totpsChildren = document.getElementById("totps").children;
		for(var i = 0; i < totpsChildren.length; i++) {
			var totpDOM = totpsChildren[i];
			if (totpDOM === document.activeElement) {
				focused_bt_id = totpDOM.getAttribute('id');
			}
		}
		return focused_bt_id;
	}
	
	function js_copy_totp(id){
		document.getElementById('totp-'+id).style = 'background:orange;';
		var text = document.getElementById('totp-'+id).getAttribute('data-totp');
		js_text2clipboard(text);
		setTimeout(function(){document.getElementById('totp-'+id).style.backgroundColor = ''},300);
		document.getElementById('totp-'+id).focus();
	}

	function js_text2clipboard(text) {
	  // Create the textarea input to hold our text.
	  const element = document.createElement('textarea');
	  element.value = text;
	  element.style.position = 'absolute';
	  element.style.top = '-1000px';
	  element.style.left = '-1000px';
	  // Add it to the document so that it can be focused.
	  document.body.appendChild(element);
	  // Focus on the element so that it can be copied.
	  element.focus();
	  element.setSelectionRange(0, element.value.length);
	  // Execute the copy command.
	  document.execCommand('copy');
	  // Remove the element to keep the document clear.
	  document.body.removeChild(element);
	}

</script>

</body>
</html>
