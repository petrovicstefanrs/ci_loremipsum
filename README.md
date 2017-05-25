# Loremipsum Generator Library -  Documentation

You can show your support by bying the library <a href="https://alkanyx.com/item/31/Loremipsum+Generator">here</a> . If you don't want to pay for it that's ok too. You can clone or download the library from github.

For Codeigniter 2.x & 3.x

# Use Case:

This library is intended to boost productivity and shorten the time need for templating websites or web apps. It generates placeholder text also known as loremipsum. The library has 21 functions to make generating placeholders fast and easy. Words database contains over 3300+ latin words. This makes it impossible to generate two same paragraphs or sentences making the placeholder text look realistic.
 
# Instalation:

1.  Copy the  loremipsum_model.php file from downloaded assets folder to the models folder in your Codeigniter Project : application->models. 

2.  Copy the Generate_loremipsum.php file from downloaded assets folder to the libraries folder in your Codeigniter Project : application->libraries. 

3.  Import the loremipsumi.sql file to your MySQL database as a table and name it “loremipsumi”.
 
# Usage:

In order to be able to access the functions from the library you have to:
1.  Load the library in your autoload.php file (application->config->autoload.php) by locating the 
“ $autoload['libraries'] = array(); “ code in the autoload.php file and insert the library name into the array -> $autoload['libraries'] = array('generate_loremipsum');

OR

2.  Write the folowing code: $this->load->library('generate_loremipsum'); inside the controller constuctor or class.

3.  Now you can call the library functions by prefixing the function names with $this->generate_loremipsum-> 
Eg. $this->generate_loremipsum->shortParagrah();

4.  If you load the library with autoload you can use its functions from every controller and view in the project. 
If you load the library in the controller constuctor you can use its function in every class of that controller or every view called from that controller. 
If you load the library in a class from a controller you can use its functions only inside that class or views called by that class.
 
# Available Functions:

## Word Functions:
1.  nWords($n)  function returns an array with $n number of words.


## Sentence Functions:
1.  customSentence($maxlen,$minlen) function returns a sentence as a string that has maximum $maxlen number of words and minimum $minlen number of words.

2.  shortSentence() function returns a sentence as a string that has maximum 10 words and minimum 5 words.

3.  mediumSentence()    function returns a sentence as a string that has maximum 20 words and minimum 15 words.

4.  longSentence()      function returns a sentence as a string that has maximum 30 words and minimum 25 words.

5.  extraLongSentence() function returns a sentence as a string that has maximum 40 words and minimum 35 words.

6.  nCustomSentences($maxlen, $minlen, $n)  function returns an array with $n number of sentences that have maximum $maxlen words and minimum $minlen words.

7.  nShortSentences($n) function returns an array with $n number of  short sentences.

8.  nMediumSentences($n)    function returns an array with $n number of  medium sentences.

9.  nLongSentences($n)  function returns an array with $n number of  long sentences.

10. nExtraLongSentences($n) function returns an array with $n number of extra long sentences.
 
## Paragraph Functions:
1.  customParagraph($maxlen,$minlen)    function returns a paragraph as a string that has maximum $maxlen number of words and minimum $minlen number of words.

2.  shortParagraph()    function returns a paragraph as a string that has maximum 50 words and minimum 25 words.

3.  mediumParagraph()   function returns a paragraph as a string that has maximum 120 words and minimum 70 words.

4.  longParagraph() function returns a paragraph as a string that has maximum 190 words and minimum 140 words.

5.  extraLongParagraph()        function returns a paragraph as a string that has maximum 260 words and minimum 210 words.

6.  nCustomParagraphs($maxlen, $minlen, $n) function returns an array with $n number of paragraphs that have maximum $maxlen words and minimum $minlen words.

7.  nShortParagraphs($n)    function returns an array with $n number of  short paragraphs.

8.  nMediumParagraphs($n)   function returns an array with $n number of  medium paragraphs.

9.  nLongParagraphs($n) function returns an array with $n number of  long paragraphs.

10. nExtraLongParagraphs($n)    function returns an array with $n number of extra long paragraphs.


