<?php
 
class MaltBlue_Iterator_Filter_DateOfBirth extends FilterIterator
{
	protected $_yearOfBirth;
	protected $_comparisonDate;

	public function setYearOfBirth($yearOfBirth = null)
	{
		if (!empty($yearOfBirth)) {
			$this->_yearOfBirth = $yearOfBirth;
			try {
				$this->_comparisonDate = new DateTime($yearOfBirth . "-01-01");	
			} catch(Exception $e) {
				// log error
			}			
		}
	}

    public function accept()
    {
        $value = $this->current();
        if (array_key_exists('dob', $value) && !empty($value['dob'])) {
        	try {
        		$dob = new DateTime($value['dob']);	
        		if ($this->_comparisonDate 
        			&& $this->_comparisonDate instanceof DateTime) 
        		{
        			$dateInterval = $this->_comparisonDate->diff($dob);
					return ($dateInterval->format('%R%a') >= 0) ? true : false;
        		}
        	} catch (Exception $e) {
        		// log error
        	}
        }
        return false;
    }
}