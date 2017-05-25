<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	*
	* Author : Stefan Petrovic
	* Website : www.petrovicstefan.rs
	* Product : Loremipsum Generator (Library)
	* Version : 1.0.0
	* 
	*/
	
	class Generate_loremipsum
	{
		
		private $words = null; // Init var for words from database

		function __construct()
		{
			$CI =& get_instance();
			$CI->load->model('loremipsum_model');
			$this->words = $CI->loremipsum_model->getWords();
			
		}

		/************************************* Code for generating words *******************************************/

		function nWords($n){
			$words = array();
			$allwords=count($this->words)-1;	// Num of words in dbase
			for ($i=0; $i < $n; $i++) { 
				$words[]=$this->words[mt_rand(0,$allwords)]->word;
			}

			return $words;
		}

		/************************************* Code for generating sentences *******************************************/

		/* Custom Sentence - Other sentence functions are derived from this function */

		function customSentence($maxlen,$minlen) { 
			$num_of_words=mt_rand($minlen,$maxlen); // Random number of words in this sentence based on max len and maxlen-100(minlen)
			$allwords=count($this->words)-1;	// Num of words in dbase

			$sentence="";	// Starting sentence
			for ($i = 0; $i < $num_of_words; $i++) {
				$sentence.=$this->words[mt_rand(0,$allwords)]->word." ";
			}	
			$num_of_commas=mt_rand(3,7);
			$comma_start_pos = 15;
			for ($i=0; $i < $num_of_commas; $i++) { 
				if ($comma_start_pos<(strlen($sentence)-15)) {
					$rand_pos = mt_rand($comma_start_pos,strlen($sentence)-15);
					$sentence = substr($sentence, 0, $rand_pos).", ".substr($sentence, $rand_pos);
					$comma_start_pos+=20;
				}
			}
			$sentence=trim(ucfirst($sentence)).". ";
			$sentence=str_replace(' , ', ', ', $sentence);
			$sentence=str_replace(',, ', ', ', $sentence);
			$sentence=str_replace(', , ', ', ', $sentence);

			return $sentence;
		}

		function shortSentence(){
			return $this->customSentence(10,5);
		}

		function mediumSentence(){
			return $this->customSentence(20,15);
		}

		function longSentence(){
			return $this->customSentence(30,25);
		}

		function extraLongSentence(){
			return $this->customSentence(40,35);
		}

		function nCustomSentences($maxlen, $minlen, $n)
		{
			$sentences=array(); // Empty sentences array
			for ($i=0; $i < $n; $i++) { 
				$sentences[$i]=$this->customSentence($maxlen,$minlen);
			}

			return $sentences;
		}

		function nShortSentences($n)
		{
			$sentences=array(); // Empty sentences array
			for ($i=0; $i < $n; $i++) { 
				$sentences[$i]=$this->shortSentence();
			}

			return $sentences;
		}

		function nMediumSentences($n)
		{
			$sentences=array(); // Empty sentences array
			for ($i=0; $i < $n; $i++) { 
				$sentences[$i]=$this->mediumSentence();
			}

			return $sentences;
		}

		function nLongSentences($n)
		{
			$sentences=array(); // Empty sentences array
			for ($i=0; $i < $n; $i++) { 
				$sentences[$i]=$this->longSentence();
			}

			return $sentences;
		}

		function nExtraLongSentences($n)
		{
			$sentences=array(); // Empty sentences array
			for ($i=0; $i < $n; $i++) { 
				$sentences[$i]=$this->extraLongSentence();
			}

			return $sentences;
		}

		/************************************* Code for generating paragraphs *******************************************/

		/* Custom Paragraph - Other functions are derived from this function */

		function customParagraph($maxlen,$minlen) { 
			$num_of_words=mt_rand($minlen,$maxlen); // Random number of words in this paragraph based on max len and maxlen-100(minlen)
			$allwords=count($this->words)-1;	// Num of words in dbase
			$paragraph="";	// Starting paragraph
			$num_of_sent=mt_rand(3,7); // Number of sentences in paragraph

			$j=0;
			while($j<$num_of_sent){
				$num_words_sen=mt_rand(floor($minlen/3),floor($num_of_words/3)); // Number of words in sentence
				$sentence="";	// Starting sentence
				for ($i = 0; $i < $num_words_sen; $i++) {
					$sentence.=$this->words[mt_rand(0,$allwords)]->word." ";
				}	
				$num_of_commas=mt_rand(3,7);
				$comma_start_pos = 15;
				for ($i=0; $i < $num_of_commas; $i++) { 
					if ($comma_start_pos<(strlen($sentence)-15)) {
						$rand_pos = mt_rand($comma_start_pos,strlen($sentence)-15);
						$sentence = substr($sentence, 0, $rand_pos).", ".substr($sentence, $rand_pos);
						$comma_start_pos+=20;
					}
				}
				$sentence=trim(ucfirst($sentence)).". ";
				$sentence=str_replace(' , ', ', ', $sentence);
				$sentence=str_replace(',, ', ', ', $sentence);
				$sentence=str_replace(', , ', ', ', $sentence);
				$paragraph.=$sentence;
				$j++;
			}
			
			return $paragraph;
		}

		/* Premade Paragraphs - Generate random paragraphs by predetermined values */

		function shortParagraph() { 
			return $this->customParagraph(50,25);
		}
		
		function mediumParagraph() { 
			return $this->customParagraph(120,70);
		}

		function longParagraph() { 
			return $this->customParagraph(190,140);
		}

		function extraLongParagraph() { 
			return $this->customParagraph(260,210);
		}
		
		/* Custom number of paragraphs */

		function nCustomParagraphs($maxlen, $minlen, $n)
		{
			$paragraphs=array(); // Empty paragraphs array
			for ($i=0; $i < $n; $i++) { 
				$paragraphs[$i]=$this->customParagraph($maxlen,$minlen);
			}

			return $paragraphs;
		}

		function nShortParagraphs($n)
		{
			$paragraphs=array(); 
			for ($i=0; $i < $n; $i++) { 
				$paragraphs[$i]=$this->shortParagraph();
			}

			return $paragraphs;
		}

		function nMediumParagraphs($n)
		{
			$paragraphs=array(); 
			for ($i=0; $i < $n; $i++) { 
				$paragraphs[$i]=$this->mediumParagraph();
			}

			return $paragraphs;
		}

		function nLongParagraphs($n)
		{
			$paragraphs=array(); 
			for ($i=0; $i < $n; $i++) { 
				$paragraphs[$i]=$this->longParagraph();
			}

			return $paragraphs;
		}

		function nExtraLongParagraphs($n)
		{
			$paragraphs=array(); 
			for ($i=0; $i < $n; $i++) { 
				$paragraphs[$i]=$this->extraLongParagraph();
			}

			return $paragraphs;
		}
	}
?>
