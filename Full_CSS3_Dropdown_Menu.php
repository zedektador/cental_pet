<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>   
<style>
*{
  padding: 0;
  margin: 0;
  font-family: 'Lato', sans-serif;
  box-sizing: border-box;
}
.float-right{
  float: right;
}
.fa{
 font-size: .8em;
  line-height: 22px !important;
}
dropdown{
   display: inline-block;
   margin: 20px 50px; 
}
dropdown label, dropdown ul li{
  display: block;
  width: 200px;
  background: #ECF0F1;
  padding: 15px 20px;
}
dropdown label:hover, dropdown ul li:hover{
  background: #1ABC9C;
  color: white;
  cursor: pointer;
}
dropdown label{
  color: #1ABC9C;
  border-left: 4px solid #1ABC9C;
  border-radius: 0 5px 0 0; 
  position: relative;
  z-index: 2;
}
dropdown input{
  display: none;
}
dropdown input ~ ul{
  position: relative;
  visibility: hidden;
  opacity: 0;
  top: -20px;
  z-index: 1;
}
dropdown input:checked + label{
  background: #1ABC9C;
  color: white;
}

dropdown input:checked ~ ul{
  visibility: visible;
  opacity: 1;
  top: 0;
}
$colors: #E74C3C, #0072B5, #2C3E50;

@for $i from 1 through length($colors) {
  dropdown ul li:nth-child(#{$i}) {
    border-left: 4px solid nth($colors, $i);
    .fa{
      color: nth($colors, $i);
    }
    &:hover {
        background: nth($colors, $i);
        color: white;
      .fa{
        color: white; 
      }
    }
  }
}

.animate{
  -webkit-transition: all .3s;
  -moz-transition: all .3s;
  -ms-transition: all .3s;
  -ms-transition: all .3s;
  transition: all .3s;  
  backface-visibility:hidden;
  -webkit-backface-visibility:hidden; /* Chrome and Safari */
  -moz-backface-visibility:hidden; /* Firefox */
  -ms-backface-visibility:hidden; /* Internet Explorer */
}
</style>
<body>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<dropdown>
  <input id="toggle1" type="checkbox" checked>
  <label for="toggle1" class="animate">Editor<i class="fa fa-list float-right"></i></label>
  <ul class="animate">
    <li class="animate">Source<i class="fa fa-code float-right"></i></li>
    <li class="animate">Fullpage<i class="fa fa-arrows-alt float-right"></i></li>
    <li class="animate">Debug<i class="fa fa-cog float-right"></i></li>
  </ul>
</dropdown>

<dropdown>
  <input id="toggle2" type="checkbox">
  <label for="toggle2" class="animate">Editor<i class="fa fa-list float-right"></i></label>
  <ul class="animate">
    <li class="animate">Source<i class="fa fa-code float-right"></i></li>
    <li class="animate">Fullpage<i class="fa fa-arrows-alt float-right"></i></li>
    <li class="animate">Debug<i class="fa fa-cog float-right"></i></li>
  </ul>
</dropdown>


</body>
</html>