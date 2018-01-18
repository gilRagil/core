<?php 
	session_start();
    $target = 1;
    require_once("controllers/class.CtrlGlobal.php");
    $objCtrl = new CtrlGlobal();
    if($_GET['act'] == "") $act = $_POST['act'];
    else $act = $_GET['act'];
    if($_GET['xid'] == "") $xid = $_POST['xid'];
    else $xid = $_GET['xid'];

    switch ($act) {
        case 'selectMaster':
            $sql = "SELECT * FROM item";
            $row = $objCtrl->GetGlobalFilter($sql);
            echo json_encode($row);
            break;
        case 'selOneItem':
            $sql = "SELECT concat(id_item,'#',item_name,'#',barcode) as name FROM item WHERE id_item = 'ITM/11/2017/00003'";
            $row = $objCtrl->getName($sql);
            echo json_encode($row);
            break;
        case 'insertData':
            $objCtrl->insert('item',array(
                'id_item' => 'ITM001',
                'id_company' => 'ICM001'
            )); 
            break;
        case 'updateData':
            $objCtrl->update('item',array(
                'item_name' => 'Ekstra Bos',
                'limit_stock' => '20',
                'unit' => 'PCS'
            ),array('id_item' => 'ITM001'));
            break;
        case 'deleteData':
            $objCtrl->delete('item',array(
                'id_item' => 'ITM001'
            ));
            break;
        case 'genNumber':
            echo $objCtrl->generateNumber(4);
            break;
        case 'konversi':
            echo $objCtrl->konversi_tanggal('22-11-2018');
            break;
        case 'selGlobal':
            echo $objCtrl->selGlobal('ITM/11/2017/00005','id_item2','id_item','item_name','item');
            break;
        case 'convertNumber':
            echo $objCtrl->convert_number_to_words('29348920');
            break;
        case 'encode':
            echo $objCtrl->encode('12230478823479823749274892374982374893724982749823749287349873');
            break;
        case 'decode':
            echo $objCtrl->decode('aDZnZGUzVFFPQjVidnlUNlkzRUdOa2RWZFMwY3AzUTR2VWtkUXVLZzhZdExCU2xQMDVyT2JSY3JEYnE4c3MwMG92UnExVWFBUUFpcklzN1RRZWw2bXc9PQ==');
            break;
    	default:
    		# code...
    		break;
    }
?>