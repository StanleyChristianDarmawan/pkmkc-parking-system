
<?php
// require __DIR__ . '/../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

    $connector = new WindowsPrintConnector("TM-T82");
    $printer = new Printer($connector);

    $title = "STRUK MASUK";
    $printer->initialize();
    $printer->setFont(Printer::FONT_A);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("\n");

    /* Height and width */
    foreach ($print as $print) {

        $printer->initialize();
        $printer->setFont(Printer::FONT_A);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("\n");

        $printer->initialize();
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->setTextSize(2, 2);
        $printer->text("PARKIR " . strtoupper($print->tarif->jenis_kendaraan) . "\n");
        $printer->feed();

        $printer->initialize();
        $printer->setFont(Printer::FONT_B);
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text('Waktu Masuk : ' . date('d-m-Y | H:i:s'). "\n");
        $printer->setLineSpacing(5);
        $printer->feed();

        $printer->selectPrintMode();
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->setBarcodeHeight(60);
        $printer->setBarcodeWidth(2);
        $printer->setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
        $printer->barcode($print->kode_parkir, Printer::BARCODE_CODE39);
        $printer->feed();

        $printer->initialize();
        $printer->setFont(Printer::FONT_A);
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("\n\n");
        $printer->text("Karcis Jangan Sampai Hilang\n");
        $printer->text("Terima Kasih\n");
        $printer->text("\n");
        $printer->feed();

        $printer->cut();
        $printer->close();

        return redirect('/')->route('masuk');

}

