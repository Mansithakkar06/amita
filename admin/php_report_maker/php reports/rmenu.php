<?php
namespace PHPReportMaker12\project1;
?>
<?php
namespace PHPReportMaker12\project1;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(3, "mi_supplier_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("3", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "supplier_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(8, "mi_sales_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("8", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "sales_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(12, "mi_sales_return_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("12", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "sales_return_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(15, "mi_raw_material_stock_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("15", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "raw_material_stock_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(17, "mi_product_stock_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("17", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "product_stock_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(19, "mi_rating_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("19", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "rating_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(22, "mi_purchase_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("22", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "purchase_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(25, "mi_purchase_return_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("25", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "purchase_return_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(27, "mi_offer_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("27", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "offer_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(30, "mi_inquiry_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("30", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "inquiry_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(32, "mi_feedback_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("32", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "feedback_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(35, "mi_appointment_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("35", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "appointment_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(36, "mi_customized_order_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("36", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "customized_order_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>