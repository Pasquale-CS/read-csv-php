<?php

/**
* @Author:        Pasquale Cappa Spina;
* @Website:       http://pasqualecappaspina.com;
* @Description:   Class in PHP for read CSV files;
*/

class PcsReadCsv
{
	private $csv;
	private	$is_title;
	private $length;
	private	$delimiter;
	private	$enclosure;
	private	$escape;
	private $f_name;
	private $c_rows;

	function __construct($csv, $is_title = false, $length = 0, $delimiter = ';', $enclosure = '"', $escape = "\\")
	{
		$extension = end(explode('.', $csv['name']));
		if($extension !== 'csv')
		   exit('No CSV file.');

		$this->csv = $csv;
		$this->is_title = $is_title;
		$this->length = $length;
		$this->delimiter = $delimiter;
		$this->enclosure = $enclosure;
		$this->escape = $escape;
		$this->f_name = $csv['name'];
	}

	public function set_is_title($is_title)
	{
		$this->is_title = $is_title;
	}

	public function set_length($length)
	{
		$this->length = $length;
	}

	public function set_delimiter($delimiter)
	{
		$this->delimiter = $delimiter;
	}

	public function set_enclosure($enclosure)
	{
		$this->enclosure = $enclosure;
	}

	public function set_escape($escape)
	{
		$this->escape = $escape;
	}

	public function get_is_title()
	{
		return $this->is_title;
	}

	public function get_length()
	{
		return $this->length;
	}

	public function get_delimiter()
	{
		return $this->delimiter;
	}

	public function get_enclosure()
	{
		return $this->enclosure;
	}

	public function get_escape()
	{
		return $this->escape;
	}

	public function get_file_name()
	{
		return $this->f_name;
	}

	public function get_rows_count()
	{
		return $this->c_rows;
	}

	public function read()
	{
		$this->c_rows = 1;
		$results = array();

		if (($handle = fopen($this->csv['tmp_name'], "r")) !== FALSE)
		{
		    while (($data = fgetcsv($handle, $this->length, $this->delimiter, $this->enclosure, $this->escape)) !== FALSE)
		    {
		        $results[] = $data;

		        $this->c_rows++;
		    }

		    fclose($handle);
		}

		return $results;
	}

	public function print_table($class = '', $id = '')
	{
		$print = '';
		$count = 1;
		$values = $this->read();

		$print .= '<table class="' . $class . '" id="' . $id . '">';
		$print .= 	'<caption><h3>' . $this->f_name . '</h3></caption>';

		foreach ($values as $value)
		{
			$print .= '<tr>';

			foreach ($value as $v)
			{
				if($count === 1 && $this->is_title === true)
					$print .= "<th>$v</th>";
				else
					$print .= "<td>$v</td>";
			}

			$print .= '</tr>';

			$count++;
		}

		$print .= '</table>';

		return $print;
	}
}
