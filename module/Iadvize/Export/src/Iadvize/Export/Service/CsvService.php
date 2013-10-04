<?php
namespace Iadvize\Export\Service;

class CsvService {

	/**
	 * Export Csv line into Csv file.
	 *
	 * @param  array $lines     - An array of arrays representing the cells of the CSV file.
	 * @param  string $filename - The name of the file.
	 *
	 * @return void
	 */
	public function outputCsv(array $lines, $fileName, $bom = false) {

		$exportDirectory = 'output/';

		if (!is_dir($exportDirectory)) {
			mkdir($exportDirectory);
		}

		$ressource = fopen($exportDirectory . $fileName. '.csv', 'w');

		if ($bom) {
			fputs($ressource, $bom = ( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
		}

		foreach ($lines as $line) {
			fputcsv($ressource, $csvLine, ',', '"');
		}

		fclose($ressource);
	}
}
