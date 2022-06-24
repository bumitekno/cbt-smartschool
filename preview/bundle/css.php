<link rel="stylesheet" href="../js/sweetalert.css">
	<style>
    .no-close .ui-dialog-titlebar-close {display: none;}
	</style>
	<style>
		.left {float: left; width: 65%;}
		.right {float: right; width: 30%; background-color: #333333; height:101px; color:#FFFFFF;	
		font-size: 13px; font-style:normal; font-weight:normal;}
		.user {color:#FFFFFF; font-size: 15px; font-style:normal; font-weight:bold;	top:-20px;}
		.log {color:#3799c2; font-size: 11px; font-style:normal; font-weight:bold; top:-20px;}
		.group:after {content:""; display: table; clear: both;}
		/*	img {max-width: 100%; height: auto;}	*/
		.visible{display: block !important;}
		.hidden{display: none !important;}
		.foto{height:80px;}	
		@media screen and (max-width: 780px) { /* jika screen maks. 780 right turun */
		/*    .left, */
		.left,
		.right {float: none; width: auto; margin-top:0px; height:91px; color:#FFFFFF; display:block;}
		.foto{height:65px;}}
		@media screen and (max-width: 400px) { /* jika screen maks. 780 right turun */
		/*    .left, */
		.left{width: auto; height: 91px;}
		.right {float: none; width: auto; margin-top:0px; height:60px; color:#FFFFFF;}
		.foto{height:40px;}	}
	</style>
	<style>
    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #242a30;
    color: #565656;
    text-align: center;
    font-family: sans-serif;
    }
    .tombol {
    position: sticky;
    left: 0;
    margin-bottom: 40px;
    width: 100%;
    background-color: #ffffff
    color: white;
    text-align: center;
    }
    </style>
    <style type="text/css">
    label.custom-radio-button input[type="radio"] {
    opacity:0;
    cursor:pointer;
    }
 
    label.custom-radio-button input[type="radio"] ~ .helping-el {

    border: 1px solid #a5a5a5;  
    border-radius: 50%;
    display: inline-block;
    margin-right: -23px;
    padding: 13px;
    position: relative;
    top: 7px;
    cursor:pointer;
    }
 
    label.custom-radio-button input[type="radio"]:checked ~ .helping-el {
    border: 0px solid #596ff9;
    cursor:pointer;
    }
 
    label.custom-radio-button input[type="radio"]:checked ~ .helping-el:after {
    background-color: #0d70c1;
    cursor:pointer;
    border-radius: 100%;
    content: "";
    font-size: 25px;
    height: 20px;
    left: 3px;
    position: absolute;
    top: 3px;
    width: 20px;
	padding: 13px;
     
    }
    .responsive {
max-width: 100%;
height: auto;
}
.open_modal { cursor:zoom-in; }
#keto { cursor:default; pointer-events:none;}
#nomer { cursor:default; pointer-events:none;}
#divwaktu { cursor:default; pointer-events:none; font-weight: bold;}
#divwaktu2 { cursor:default; pointer-events:none; font-weight: bold;}
#ket { cursor:default;}
#ket1 { cursor:zoom-out; }
#ket2 { cursor:pointer; }
#ket3 { cursor:zoom-in; }
#btn { cursor:default; pointer-events:none;}
#sidenav { box-shadow: -1px 10px 10px black; }
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 22px;
    cursor: pointer;
    font-size: 13px;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.max {
        max-height:500px;
        width:auto;
    }
.max-modal {
        max-height:80%;
        width:auto;
    }
#yak {
    border-radius:0;
}
.footer {
    z-index:2;
}
#done {
     border-radius:0;
    position: absolute;
    right: 30;
    bottom:37px;
    border: 0px solid #73AD21;
    z-index:1;
    height:34px;
}
.btnnav {
    border:0px;
}
.btnnav:focus {
  outline: none;
}
#hm {
border-radius:0;background-color:#db2020;color:white;height:42px;     
}
#hm:focus {
outline: none;    
}
#cho {
    margin-left:70px;
    margin-top:-23px;
}
.preview h4 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(40, end),
    blink-caret .75s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange; }
}
#app {
    font-size:20px;
    font-weight: bold;
    color:red;
    letter-spacing: 2px;
}
#ragu {
    border-radius:0;
    background-color:orange;
     position: absolute;
    left: 39%;
    bottom:38px;
    z-index:1;
    height:32px;
}
    </style>