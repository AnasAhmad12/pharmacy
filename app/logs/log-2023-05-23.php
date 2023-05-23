<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-23 11:55:39 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\wamp\www\pharmacy\system\database\drivers\mysqli\mysqli_driver.php 203
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-23 11:55:39 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\wamp\www\pharmacy\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2023-05-23 11:55:39 --> Unable to connect to the database
ERROR - 2023-05-23 11:55:39 --> Unable to connect to the database
ERROR - 2023-05-23 11:55:43 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\wamp\www\pharmacy\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2023-05-23 11:55:43 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\wamp\www\pharmacy\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2023-05-23 11:55:43 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: c:/wamp/tmp) C:\wamp\www\pharmacy\system\libraries\Session\Session.php 143
ERROR - 2023-05-23 11:55:43 --> Severity: Warning --> session_start(): Failed to initialize storage module: user (path: c:/wamp/tmp) C:\wamp\www\pharmacy\system\libraries\Session\Session.php 143
ERROR - 2023-05-23 11:55:47 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\wamp\www\pharmacy\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2023-05-23 11:55:47 --> Unable to connect to the database
ERROR - 2023-05-23 11:55:47 --> Query error: No connection could be made because the target machine actively refused it - Invalid query: SET SESSION sql_mode = ""
ERROR - 2023-05-23 11:55:47 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\wamp\www\pharmacy\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2023-05-23 11:55:47 --> Unable to connect to the database
ERROR - 2023-05-23 11:55:47 --> Query error: No connection could be made because the target machine actively refused it - Invalid query: SET SESSION sql_mode = ""
ERROR - 2023-05-23 11:55:51 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\wamp\www\pharmacy\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2023-05-23 11:55:51 --> Unable to connect to the database
ERROR - 2023-05-23 11:55:51 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it C:\wamp\www\pharmacy\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2023-05-23 11:55:51 --> Query error: No connection could be made because the target machine actively refused it - Invalid query: SELECT *
FROM `sma_settings`
ERROR - 2023-05-23 11:55:51 --> Unable to connect to the database
ERROR - 2023-05-23 11:55:51 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\wamp\www\pharmacy\app\models\Site.php 305
ERROR - 2023-05-23 11:55:51 --> Query error: No connection could be made because the target machine actively refused it - Invalid query: SELECT *
FROM `sma_settings`
ERROR - 2023-05-23 11:55:51 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\wamp\www\pharmacy\app\models\Site.php 305
ERROR - 2023-05-23 11:55:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's.date >= '2023-02-23 11:55' AND s.date <= '2023-05-23 11:55'  GROUP BY si.produ' at line 3 - Invalid query: SELECT COALESCE( PSales.soldQty, 0 ) as sold
FROM `sma_products`
LEFT JOIN ( SELECT si.product_id, s.date as date, s.created_by as created_by, SUM( si.quantity ) soldQty, SUM( si.quantity * si.sale_unit_price ) totalSale from sma_costing si JOIN sma_sales s on s.id = si.sale_id  s.date >= '2023-02-23 11:55' AND s.date <= '2023-05-23 11:55'  GROUP BY si.product_id ) PSales ON `sma_products`.`id` = `PSales`.`product_id`
LEFT JOIN ( SELECT product_id, p.date as date, p.created_by as created_by, SUM(CASE WHEN pi.purchase_id IS NOT NULL THEN quantity ELSE 0 END) as purchasedQty, SUM(quantity_balance) as balacneQty, SUM( unit_cost * quantity_balance ) balacneValue, SUM( (CASE WHEN pi.purchase_id IS NOT NULL THEN (pi.subtotal) ELSE 0 END) ) totalPurchase from sma_purchase_items pi LEFT JOIN sma_purchases p on p.id = pi.purchase_id WHERE pi.status = 'received'  AND p.date >= '2023-02-23 11:55' AND p.date <= '2023-05-23 11:55'  GROUP BY pi.product_id ) PCosts ON `sma_products`.`id` = `PCosts`.`product_id`
WHERE `sma_products`.`type` != 'combo'
AND `sma_products`.`id` = '43'
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Refund_Request"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Deals"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "List Deals"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Add Deals"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Purchase_Check_Status"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Status List"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Pending"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Ordered"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Arrived"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Received"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Warehouses with Country"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Countries"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "List Countries"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Add Country"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Blog_Module"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "List_blog"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Add_blog"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Add Blog Category"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Show Blog Category"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Stock Requests"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Outgoing Stock Requests"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Incoming Stock Requests"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Accounts"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Chart of Accounts"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Entries"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Invoices"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Search"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Accounts Reports"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Ledger Statement"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Balance Sheet"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Truck Registration"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "List Truck Registration"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Add Truck Registration"
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 21
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 35
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 35
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "rejected"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "arrived"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Shelf Status"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Validation Status"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Temperature"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Accepted"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "Rejected"
ERROR - 2023-05-23 11:55:53 --> Could not find the language line "temperature"
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 510
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 516
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 529
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 533
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 588
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 588
ERROR - 2023-05-23 11:55:53 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 687
ERROR - 2023-05-23 11:56:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's.date >= '2023-02-23 11:56' AND s.date <= '2023-05-23 11:56'  GROUP BY si.produ' at line 3 - Invalid query: SELECT COALESCE( PSales.soldQty, 0 ) as sold
FROM `sma_products`
LEFT JOIN ( SELECT si.product_id, s.date as date, s.created_by as created_by, SUM( si.quantity ) soldQty, SUM( si.quantity * si.sale_unit_price ) totalSale from sma_costing si JOIN sma_sales s on s.id = si.sale_id  s.date >= '2023-02-23 11:56' AND s.date <= '2023-05-23 11:56'  GROUP BY si.product_id ) PSales ON `sma_products`.`id` = `PSales`.`product_id`
LEFT JOIN ( SELECT product_id, p.date as date, p.created_by as created_by, SUM(CASE WHEN pi.purchase_id IS NOT NULL THEN quantity ELSE 0 END) as purchasedQty, SUM(quantity_balance) as balacneQty, SUM( unit_cost * quantity_balance ) balacneValue, SUM( (CASE WHEN pi.purchase_id IS NOT NULL THEN (pi.subtotal) ELSE 0 END) ) totalPurchase from sma_purchase_items pi LEFT JOIN sma_purchases p on p.id = pi.purchase_id WHERE pi.status = 'received'  AND p.date >= '2023-02-23 11:56' AND p.date <= '2023-05-23 11:56'  GROUP BY pi.product_id ) PCosts ON `sma_products`.`id` = `PCosts`.`product_id`
WHERE `sma_products`.`type` != 'combo'
AND `sma_products`.`id` = '43'
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Refund_Request"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Deals"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "List Deals"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Add Deals"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Purchase_Check_Status"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Status List"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Pending"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Ordered"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Arrived"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Received"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Warehouses with Country"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Countries"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "List Countries"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Add Country"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Blog_Module"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "List_blog"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Add_blog"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Add Blog Category"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Show Blog Category"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Stock Requests"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Outgoing Stock Requests"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Incoming Stock Requests"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Accounts"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Chart of Accounts"
ERROR - 2023-05-23 11:56:28 --> Could not find the language line "Entries"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Invoices"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Search"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Accounts Reports"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Ledger Statement"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Balance Sheet"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Truck Registration"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "List Truck Registration"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Add Truck Registration"
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 21
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 35
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 35
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "rejected"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "arrived"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Shelf Status"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Validation Status"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Temperature"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Accepted"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "Rejected"
ERROR - 2023-05-23 11:56:29 --> Could not find the language line "temperature"
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 510
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 516
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 529
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 533
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 588
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 588
ERROR - 2023-05-23 11:56:29 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 687
ERROR - 2023-05-23 11:57:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 's.date >= '2023-02-23 11:57' AND s.date <= '2023-05-23 11:57'  GROUP BY si.produ' at line 3 - Invalid query: SELECT COALESCE( PSales.soldQty, 0 ) as sold
FROM `sma_products`
LEFT JOIN ( SELECT si.product_id, s.date as date, s.created_by as created_by, SUM( si.quantity ) soldQty, SUM( si.quantity * si.sale_unit_price ) totalSale from sma_costing si JOIN sma_sales s on s.id = si.sale_id  s.date >= '2023-02-23 11:57' AND s.date <= '2023-05-23 11:57'  GROUP BY si.product_id ) PSales ON `sma_products`.`id` = `PSales`.`product_id`
LEFT JOIN ( SELECT product_id, p.date as date, p.created_by as created_by, SUM(CASE WHEN pi.purchase_id IS NOT NULL THEN quantity ELSE 0 END) as purchasedQty, SUM(quantity_balance) as balacneQty, SUM( unit_cost * quantity_balance ) balacneValue, SUM( (CASE WHEN pi.purchase_id IS NOT NULL THEN (pi.subtotal) ELSE 0 END) ) totalPurchase from sma_purchase_items pi LEFT JOIN sma_purchases p on p.id = pi.purchase_id WHERE pi.status = 'received'  AND p.date >= '2023-02-23 11:57' AND p.date <= '2023-05-23 11:57'  GROUP BY pi.product_id ) PCosts ON `sma_products`.`id` = `PCosts`.`product_id`
WHERE `sma_products`.`type` != 'combo'
AND `sma_products`.`id` = '43'
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Refund_Request"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Deals"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "List Deals"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Add Deals"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Purchase_Check_Status"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Status List"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Pending"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Ordered"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Arrived"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Received"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Warehouses with Country"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Countries"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "List Countries"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Add Country"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Blog_Module"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "List_blog"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Add_blog"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Add Blog Category"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Show Blog Category"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Stock Requests"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Outgoing Stock Requests"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Incoming Stock Requests"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Accounts"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Chart of Accounts"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Entries"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Invoices"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Search"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Accounts Reports"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Ledger Statement"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Balance Sheet"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Truck Registration"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "List Truck Registration"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Add Truck Registration"
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 21
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 35
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 35
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "rejected"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "arrived"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Shelf Status"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Validation Status"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Temperature"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Accepted"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "Rejected"
ERROR - 2023-05-23 11:57:00 --> Could not find the language line "temperature"
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 510
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 516
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 529
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 533
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 588
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 588
ERROR - 2023-05-23 11:57:00 --> Severity: Warning --> Trying to access array offset on value of type null C:\wamp\www\pharmacy\themes\blue\admin\views\purchases\edit.php 687
