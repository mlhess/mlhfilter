<?php 
require("filter.inc");
$htmlstring = "<div class='hi'> <b> This is my div </b></div>";
$badStringWithXSS="<script>alert('hi')</script>";
print check_plain($badStringWithXSS);
print "<br>";
//returns &lt;script&gt;alert(&#039;hi&#039;)&lt;/script&gt;
print filter_xss($badStringWithXSS);
//returns alert('hi')
print "<br>";

print check_plain($htmlstring);
// returns &lt;div class=&#039;hi&#039;&gt; &lt;b&gt; This is my div &lt;/b&gt;&lt;/div&gt; 
print "<br>";
print filter_xss($htmlstring);
//returns <div class='hi'> <b> This is my div </b></div>
print "<br>";
print filter_xss($htmlstring,array('b'));
//returns <b> This is my div </b> as we did not allow the div tag above
