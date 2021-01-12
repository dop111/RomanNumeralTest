<?php
namespace PhpNwSykes;

class RomanNumeral
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    protected $numeral;

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toInt():int
    {
        $romanNumber = str_split($this->numeral); //parse into chars
        
        $total = 0;
        
        for ($counter = 0; $counter < sizeof($romanNumber); $counter++) {
        	$currentValue = array_search($romanNumber[$counter],$this->symbols);
        	
        	if ($currentValue == false) throw new InvalidNumeral(); //throw exception if an invalid char is encountered
        	
        	$nextValue = ($counter+1 < sizeof($romanNumber))?array_search($romanNumber[$counter+1],$this->symbols):0;
        	
        	if ($nextValue > $currentValue) {
        		$total += $nextValue - $currentValue;
        		$counter++;
        	} else {
        		$total += $currentValue;
        	}
        	
        }

        return $total;
    }
}
?>
