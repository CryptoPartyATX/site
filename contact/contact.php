
<?php
	if ($js=="yes"||$js=="auto-yes"){
  		echo "<script src=\"/contact/openpgp.min.js\" type=\"text/javascript\"></script>\n";
  	}
?>
<h1>Contact Us</h1>
<h3><em>Here are a few easy ways to get in touch with us.</em></h3>

<h2>Twitter</h2>
<p>Look for <a href="https://twitter.com/atxcrypto">@ATXCrypto</a> on Twitter and feel free to send us a direct message.</p>

<h2>Email</h2>
<p>
Email us at <a href="mailto:plexiglass@riseup.net">plexiglass@riseup.net</a>. We encourage 
you to encrypt the email with <a href="/content/FE0E7924.asc">this public key</a>, or use 
the form below to send an encrypted email.
</p>

<h2>Submit an Encrypted Email</h2>
<?php
	if ($js!="yes"&&$js!="auto-yes"){
	echo "<strong>WARNING: This form requires Javascript, which is currently disabled. Please enable Javascript to use this form.</strong>\n";
	}
?>
<p>
	This form will allow you to send us an encrypted email message without installing any
	additional software on your computer. The message will first be encrypted in your 
	browser using <a href="http://openpgpjs.org/">OpenPGP.js</a> before being sent via an 
	encrypted SSL/TLS connection through CryptoPartyATX.org.<br /><br />
	Please optionally include a name, reply email address, or subject in the box below.
</p>

<form name="contact" method="post" action="/contact/send_form.php" onsubmit="return encrypt();">


<?php	
	// initialize random values for decoy messages
	for($i=0; $i<100; $i++){$rand1 .= mt_rand();}
	for($i=0; $i<100; $i++){$rand2 .= mt_rand();}
	for($i=0; $i<100; $i++){$rand3 .= mt_rand();}
	for($i=0; $i<100; $i++){$rand4 .= mt_rand();}

	echo "<input type=\"hidden\" id=\"message1\" name=\"message1\" value=\"$rand1\">\n";
	echo "<input type=\"hidden\" id=\"message2\" name=\"message2\" value=\"$rand2\">\n";
	echo "<input type=\"hidden\" id=\"message3\" name=\"message3\" value=\"$rand3\">\n";
	echo "<input type=\"hidden\" id=\"message4\" name=\"message4\" value=\"$rand4\">\n";
	
?>



				<textarea  id="message" name="message" cols="70" rows="8">Name/Email:
Subject:
Message:</textarea><br />
			<input type="checkbox" id="thecheckbox" name="thecheckbox" checked=1  />&nbsp;&nbsp;Un-check this box if you are human.<br />
			<input type="submit" value="Send Email" onclick="return checkparams();">
</form><br />
This form is based on <a href="https://encrypt.to">Encrypt.to</a>'s
	<a href="https://github.com/encrypt-to/secure.contactform.php">secure contact form</a>.

<!-- your pgp public key -->

<div id="pubkey" hidden="true">
-----BEGIN PGP PUBLIC KEY BLOCK-----
Version: SKS 1.1.3

mQINBFJwZjMBEACrRXfOU1o2/WJSF+BYtG9i99HNV4ER7UGLkU2wpF8JzRhZCH1/uwwnZsKN
/vUowpWzzbpq1oG3HjHdJyC4ZvKIDHS93HczhZUFIWTkXvxBjxOI926Wk66vdcZzzV4TdrkM
0F9TL9IIKtjXhRDLSotyR3eZm2MI4C+lWipunJPVhalMZHwD1F4JzW1pxd2vk43dpb121gNS
YHSPehuklYn+JKVJtoWLH4M2PDyK9SB5KYUXiPdNG21ikLxcOLJrsTIXWGli4GDbSAoYX2fP
UTNV6e+WkQjpvL1A0mEjk06IoTP3czVg401P0qH2ZOG7aq3lznNF2YlnLAH46eIZ8ZxolmUg
qUJYR6cpu8/YjW6tZgjEo1hE7yi8RvB+0wYxX5GnPQbpN8L+Wb+Ow08k81WHorztEAv5fPo9
wq3kuNLUhefho8QtddOKzBc3TO4CL6inTy5/XVtp/JGv4KTqYeS4R84g9VVOX7cb+orwNBX+
3XwL3mEI1JRBZzDBn48FeAdKU5TI4N5+DgTu1FPtNgb98IMfK1qlAJVzW+uSkS5SH7MX+t5I
6YmZSNsfgNScmiQxYgDQGIQrUlWraieuu66qHvRv1QuDp5QpISgF7ERDLDq1REWqP3bw1EsR
dcw7kk8/xN5HMKGW+oAkSyGpN4peF4ee0ehDc+k2u+0UC+JF9QARAQABtCJwbGV4aWdsYXNz
IDxwbGV4aWdsYXNzQHJpc2V1cC5uZXQ+iQEcBBABAgAGBQJScVvRAAoJEGyXecRneC/CN5sI
AM/S1LmLYBJxRBVNYyYax5CHd5gWLynjYp9dNLxO4gI2hHMU4PH10u0rsP67egLVFdGq/9pL
jygLCzXEbeqS8RpBDa/UQkhKJysuUWEXSoev+Gre2Oexp/MFb05pjpf3sZD9gI6AWuhcDjlC
dvhUV0GpefAgmCoOBqHEAg5h25YdCja53KffynFU8kZcibmgkMPDIFRMcikzreSmQxETeYnm
kf7qjeWDqvtIRJrJOaRjCbEdv5CiiYXmDl2Lu0e9AtjFSdR4MvJsM0T49lttm6frCokJ1K95
yFZaPS1Af/oZozkbrFIezrOqV82RYjpSQaAm0fBRlUKkngCx+0cweZWJASIEEwEKAAwFAlKJ
Lo0FgweGH4AACgkQ49Yah2q2GV5Y5Af/SSrm5002J+485397R7mQkqu6ozhcppk4Na5u49vq
m1lM+GBM4U/bByVIN+gjKHzmF4J7Ja1bfrGiqNgpXwa1KVYu/iot5n/+Ob8581cu+DjWJDxv
vm5B3di8evnjT6Rs0QzcyWWmwsomgF2aMqo2pOcd3lTzFSypVFwIDbzWMyUzrf0la/2jqJcW
qy3uZvc6gSbWFyo/wFZptvkIpjpWyAi5fTMLGelV7Qv5vERO9Qo38PbfwZh37ox3/J4G7cxT
/T4FzDHP2q/XDCZT5erEeYCHrK11lS3yU7lX6CXatPn+4ScQthS+/lvWPLCZEXDH9po/Z3Lp
sMOm0uQHPok3xokCHAQTAQIABgUCUpwgOAAKCRBlDIwWCUna/pWiD/98zUUCrczZjCTVQdAZ
5Xu9Rjl5ih7wL1C7VVpahNIKIiusjb+X547M059JQDXsLxD3p/DbNntlRP8nzfCm/tL/mkHL
eh+G8hd/DNgpJ1STEVVFNO5dc2HfjQfhcTN+s6LYErZWDl/MuXI9iT33X8UdaT5ClI6+i7xl
ZzaTHOEXiM5FOA13IAWlffWEmuiX3oiQZfVC6ksns7j5bPeHojzKWhnauQiot3BaXfP5ncTo
r/RjTgPbQF9eNcSbYkyReejTa2ZFycoTxvRdBAyandVbUYwkTuk2hII+3jFhm6aLknb5kSWp
caau6byZCUZWmTn9SBrhPvi0reSBaKXn4ijcaqy1qWWkW08Cgtkka4kXFKTyflg7cPOgJfjg
WPrIvAIy61Bi2JaT0uy++i/fijzHJ3kDYV80frOxZPKKj0ilfpu5pFBTV2N3wCk8h4tHSpXw
oO2ZdKK4ngWoJ6G55u/sw6PB4FdPuznHebR1qtSghyiMwiglKmCGqIKdQmZMGu5GYn55qKHP
ncSaPtk8Iz+k/GJILRLBXBujpEJzY8M/ZDzOinkh3+KE3LO3+GIrdW/ob3dUeCBQl3Tj+spx
DUUjyfn5uht6UufojwYSrcxFY+3+XT5KVj9MSg+acaap/u6nxazny1ZAvX1IBnhXMNwjEPhf
IS7OsB9iu3xzR70L14kCIgQTAQoADAUCUnBn7QWDB4YfgAAKCRAU+DtX6I0UbihsEACp6tPF
RxN57mBjZUnfRumxEnmDbAXNZyFqQ38ELaX8xb/JT6u6IojnSKTMp0A05zt+dQdiitA5DGv7
C6FXpBKTFcl4/kZi8RVgjY7IINf7BnR9ZRiBnZk3Ma1XdmUD12Oj3jbveNrRohEBE+qP9uuq
DR6LXKwRri/rVcshYQXXyJI4Z6hp6lGZKgpOCdshdH4Jrwz3kNbqWyK49sDkYcp3z6d9Zf+5
DKJA1Pc36ogq6VuuXNq1PZ7wkAvpMWV2UasYTSoNORdbx0Izimn+IyKR//Kc2FjEvNTDYrBL
DwznPEEUK9LprD48/qCrblNy4vJRJ0891axqfqrNVwbHd+AGhtLj+ke45ke/C0g3RPx0UcYB
X3JYTxUECq/Ef1eaEsvUAf2/9XKbonssC/0qkG8Y4r4nnrVA995bdGeMfyrw9TE6nsm21E4v
3vAKACmIz2twsh7BFBcZWuihU7c4230LFeEAnJ9GTlyH3FYGVuNQaGj1CtBWKLxkSfIl11Ag
VNThuxJFq+jqTZOzO00MCPnYOstzx+Z5r+GC3/ecw2mhDNjTHyEc0wqxrWkKf9bP3KTy+vte
wtSUNymet7GfXSadJ1AzIcLAwQd9bdLyDi4Ggzflsr+lEQU6cDvDwQuuZ+zclRLPpPtXQxAY
fuJUz9D3EhGmxXMulepoDIdScywcXIkCPQQTAQoAJwUCUnBmMwIbLwUJB4YfgAULCQgHAwUV
CgkICwUWAgMBAAIeAQIXgAAKCRAaB68l/g55JH/eD/9eh3OgEsHDVRasdIMx0sJ5vYFv+LS+
qY80fhjfpiCMB8jGErMbIcB0+Us7S9QXOFOrderwpcNUSvsuqGn+PsOYKGgXHv11mFUWDrBZ
WVdk08qdc2Q1m9RvYloTYdlOUk4/HAFXas1xn0uBV4RFYGfAoj7Iq0wfFJNagVuoXApCl7gn
vNBM/aXs77h5ZldLzOwvFBUbwYwiMCtFYuG1vgMf+J7/1PenZ0xeGQ+PvDhaqI4QnugS6+39
nNDzIJqc2mJ4D0sZoeLCOcwpQtpYfprESGFB6CoE4IUKjhsKgAwdCjBopUor7miReOTI7r5s
y/ofLLsk9v0ioHjnEQHKfbqZZSEtx4PsIdfyr1/PVL/z/CAOUMjKIIMotVNfjyrRFPwhqeI8
ca5AOVWEjU8zny5EYQNfrgCFILA4mpfh1hK2VcK3BBqapz+2I0hz3ojp7jsMSid1xol2T50N
oiPFR+9Ix+W1BECiFXOBgK3jPLMRky/V5KMLFH+bvZJV194O6DrbWOHrmhwleAd4twcfOe2l
OTqhyWcEGAZSn0i/3w5JYpiEmLkU7AJp/BX0jNzJy4ShMhMYyNH0p08NugqS2ufMqhPVjU5a
4TIombLgV0A50oa9945Jv/II03DK9hgiWZVQ7FFEPjRx5Z9Cl35l059k+m5pVuDuHbUgKQ8/
z8VXN7kCDQRScGYzARAA21luXlaLp9JhqBvmGtliJ0ji6u3V62/trwbiewcz6X1S70wnGLUK
7P0y2KxSKMFkUbUcTyY2y5IOMB7v/LuqiEGWe4eDv4AhobdZYTOOO2YozAQiUku8JldXYx0Y
n/WetXIYHo/KfIhzr0pjvI590JhWeOC+MuCJ6qz/X+YzlCjmaYBQ+dXLH/41GHjQT/NG0E7E
a6vt5+RKVyQfrfw8pv4zrSfwuHi3E17nnAtOpCicGTAqnLbPep4gI9Dbfkzpf+XQs56wOCrp
DVY9yo0bt55BQjYp4v5XZJpofwct4H/+svxUr/t1CyMFgoe0Tc4dmLxJXrm/98VMU3xkM5d7
8J1cffHuDVLcKyF3fjDumXRZHRS0hUK1IPzQUI2Kdw5heX4DRAG1U7YF0hHkME/wwKkJrkln
grqE0MlCmG9mPdoNp9ZcsigtFcnibW4WrM7S045GAWSo3TGV0qj637GiL66VUlb8QRrrytBZ
FkVHx6lDGTnZ+fKm4yJYg+8E2DpuqmRCElB/wAT85Dmh4gUIWxIOGF4ZqPh/BkiM8wiEvxB8
Pzhs5wGKua8mbvygKcYmG6wFce9fPUNuJymileM3IVDQ/ncphgZApvYcUO2CaqQ1yM5i0Rwe
o+16JMURoWeTKJNvy2GmHuH5HXhFeMImCSdQL4C2bZ9jmIkFaGSSlm8AEQEAAYkERAQYAQoA
DwUCUnBmMwIbLgUJB4YfgAIpCRAaB68l/g55JMFdIAQZAQoABgUCUnBmMwAKCRAoGVL0/ZxT
VFY4D/wNeYvopm4q0nN+6638AyMeSLpyT/EgFWgiG3GF2rVBBRyJfYE/AVQ/JGWHB5pVkTDe
vEOfodHSsXeUeAHu5W6sMThboQMW600YK6sCeIb6SCNX+jfjAItmcDh4qnSnMglgVKqRm8b+
1sNKhApRm6Wjc7nflUgBfxHf3pefB4lUuC0j9GYsT2NEurk+YyS+xD3ryZN4obhM+8Jq8fXw
jJKGOVe3mj0equtnSwO1QE3ChVpkxkW3L/PMbxbsxSiRmJDOEPx4jP9Yd6bsf1WR88YWey2k
mf/JP7dfVshK+0jsTqhGQfI47+quknlsvp4YDGV7t992rJhpIg7u+9flMPxCwlq1d/x8Wo0X
0Lz+oG/Dtore7xpks8hNQiUw5QeHy9Ny66cFbxFHq4N9FVnoMEcTwXVNsGdOnHzxiylqrwjA
ht72xVVl/uThe+HcuTgfsXd8B+kQSGUe/4dS3lpd8VmfuVrEXHjPR30+UP5MtfYHIZybdqfw
z4t3DlGBmDSrsNVdd+cuxejzq98dS3mXW7k/IjFQqyQOWOcTjOmWE7Uv4FQv8ZCYu+y1INis
ABV02p1T6oJhLROXoUUGv3w7hr6Kw7SSweGCFh/IfZFwtilfJHlGj6JWZSC0yqo7qU73omdl
d1kXaSsdzXGfa9Te+dLkdjYBf2u7JDaipQwjV/0Hj1ZVD/9gUbzanIqPWK5p+fDDMgoUAui4
bUslAwEq5Bx8CF8Te8bTtt8VcHNldCxaR78Fn9jAIyvuppxtCEY1CFY3IIZFbLhTPvW787dS
8Sr2zDmWplPlowxIZfe+KaT4ZcDG5ggaGeXSFJQ8kLY0aG2jik0xoDrT7SJ9AWBqZwlwFRd3
/Uev1Gw7evRM3mtLjjSBD8SmLMjbZFg9V25WSWXrgUbcmXrwcZoz2HCStHKGcFNrVxYCWgnR
XBAICXicMCqCXYQapQxGFDD7jJC/t1KkyJFEbpz76SbpcZXeNkYtupjTNoOnEVR0Ho6DaD37
PMpxfy0/4391+2E0oLE7STxO3HwUSl2xvGRS71rBL8qjJ+ooCjvXaQtNiAL0gcZ9rSrKYG2g
d92+zvMmA55GwMhslAUSR3gFyWGiGld6sSm8TOAFxJJpC1LVfYzl0BEq6k7yuyTzEcObX+7k
FGK3ps33bteiHKseCgxTE9bfjRm/jLgdm27PEVIQrMjwsRPyl+NjSUCFYfcQ//RiXXdQifRR
vJQgBpULAPoFiwjBdR/MsCKY8ej3dEyfdDvS30WkrpOyCjh+SnuoTmJvkVePb+QPj1yTeaMp
KlT6ww+z1YKYDL8i3HRQ7Q5GiJFEOxxGz9EYtjnvSbBDxeASIcfnh2zVTvmK6qtQdUUsu4Fk
R1+xY/r51A==
=MzPG
-----END PGP PUBLIC KEY BLOCK-----
</div>
