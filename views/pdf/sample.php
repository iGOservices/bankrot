<?

/* @var $result app\models\CpoDirectory */
/* @var $client_ticket app\models\ClientTicket*/
setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>pdf-html</TITLE>
    <META name="generator" content="BCL easyConverter SDK 5.0.252">
    <META name="keywords" content=" TCPDF">
    <STYLE type="text/css">

        body {margin-top: 0px;margin-left: 0px;}

        #page_1 {position:relative; overflow: hidden;margin: 32px 0px 1px 4px;padding: 0px;border: none;width: 790px;}





        .ft0{font: 13px 'Arial';line-height: 16px;}
        .ft1{font: 1px 'Arial';line-height: 1px;}
        .ft2{font: 10px 'Arial';line-height: 10px;}
        .ft3{font: 1px 'Arial';line-height: 6px;}
        .ft4{font: 1px 'Arial';line-height: 5px;}
        .ft5{font: 6px 'Arial';line-height: 6px;}
        .ft6{font: 1px 'Arial';line-height: 4px;}
        .ft7{font: 1px 'Arial';line-height: 3px;}
        .ft8{font: 1px 'Arial';line-height: 7px;}
        .ft9{font: 1px 'Arial';line-height: 9px;}
        .ft10{font: 1px 'Helvetica';line-height: 2px;}

        .p0{text-align: left;padding-left: 61px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p1{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p2{text-align: left;padding-left: 6px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p3{text-align: right;padding-right: 5px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p4{text-align: right;padding-right: 7px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p5{text-align: left;padding-left: 17px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p6{text-align: right;padding-right: 13px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p7{text-align: right;padding-right: 39px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p8{text-align: center;padding-right: 57px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p9{text-align: right;padding-right: 53px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p10{text-align: center;padding-right: 20px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p11{text-align: right;padding-right: 8px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p12{text-align: right;padding-right: 76px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p13{text-align: center;padding-left: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p14{text-align: left;padding-left: 12px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p15{text-align: left;margin-top: 176px;margin-bottom: 0px;}

        .td0{border-left: #000000 1px solid;border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 199px;vertical-align: bottom;}
        .td1{border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 14px;vertical-align: bottom;}
        .td2{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 452px;vertical-align: bottom;}
        .td3{padding: 0px;margin: 0px;width: 14px;vertical-align: bottom;}
        .td4{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 212px;vertical-align: bottom;}
        .td5{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
        .td6{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 40px;vertical-align: bottom;}
        .td7{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
        .td8{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 12px;vertical-align: bottom;}
        .td9{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 20px;vertical-align: bottom;}
        .td10{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
        .td11{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 14px;vertical-align: bottom;}
        .td12{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 115px;vertical-align: bottom;}
        .td13{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 11px;vertical-align: bottom;}
        .td14{border-left: #000000 1px solid;border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 199px;vertical-align: bottom;}
        .td15{padding: 0px;margin: 0px;width: 26px;vertical-align: bottom;}
        .td16{padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
        .td17{padding: 0px;margin: 0px;width: 12px;vertical-align: bottom;}
        .td18{padding: 0px;margin: 0px;width: 9px;vertical-align: bottom;}
        .td19{padding: 0px;margin: 0px;width: 39px;vertical-align: bottom;}
        .td20{padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
        .td21{padding: 0px;margin: 0px;width: 34px;vertical-align: bottom;}
        .td22{padding: 0px;margin: 0px;width: 179px;vertical-align: bottom;}
        .td23{padding: 0px;margin: 0px;width: 115px;vertical-align: bottom;}
        .td24{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 26px;vertical-align: bottom;}
        .td25{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 27px;vertical-align: bottom;}
        .td26{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 39px;vertical-align: bottom;}
        .td27{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 34px;vertical-align: bottom;}
        .td28{padding: 0px;margin: 0px;width: 20px;vertical-align: bottom;}
        .td29{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 53px;vertical-align: bottom;}
        .td30{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 13px;vertical-align: bottom;}
        .td31{padding: 0px;margin: 0px;width: 92px;vertical-align: bottom;}
        .td32{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 33px;vertical-align: bottom;}
        .td33{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 19px;vertical-align: bottom;}
        .td34{padding: 0px;margin: 0px;width: 59px;vertical-align: bottom;}
        .td35{padding: 0px;margin: 0px;width: 40px;vertical-align: bottom;}
        .td36{padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
        .td37{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 128px;vertical-align: bottom;}
        .td38{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 40px;vertical-align: bottom;}
        .td39{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 13px;vertical-align: bottom;}
        .td40{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 11px;vertical-align: bottom;}
        .td41{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 114px;vertical-align: bottom;}
        .td42{padding: 0px;margin: 0px;width: 133px;vertical-align: bottom;}
        .td43{padding: 0px;margin: 0px;width: 141px;vertical-align: bottom;}
        .td44{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 166px;vertical-align: bottom;}
        .td45{padding: 0px;margin: 0px;width: 32px;vertical-align: bottom;}
        .td46{padding: 0px;margin: 0px;width: 21px;vertical-align: bottom;}
        .td47{padding: 0px;margin: 0px;width: 114px;vertical-align: bottom;}
        .td48{padding: 0px;margin: 0px;width: 13px;vertical-align: bottom;}
        .td49{padding: 0px;margin: 0px;width: 48px;vertical-align: bottom;}
        .td50{padding: 0px;margin: 0px;width: 38px;vertical-align: bottom;}
        .td51{padding: 0px;margin: 0px;width: 242px;vertical-align: bottom;}
        .td52{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 31px;vertical-align: bottom;}
        .td53{border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
        .td54{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 128px;vertical-align: bottom;}
        .td55{padding: 0px;margin: 0px;width: 67px;vertical-align: bottom;}
        .td56{padding: 0px;margin: 0px;width: 53px;vertical-align: bottom;}
        .td57{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 114px;vertical-align: bottom;}
        .td58{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 9px;vertical-align: bottom;}
        .td59{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 114px;vertical-align: bottom;}
        .td60{padding: 0px;margin: 0px;width: 230px;vertical-align: bottom;}
        .td61{padding: 0px;margin: 0px;width: 44px;vertical-align: bottom;}
        .td62{padding: 0px;margin: 0px;width: 86px;vertical-align: bottom;}
        .td63{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
        .td64{border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 153px;vertical-align: bottom;}
        .td65{border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;}
        .td66{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
        .td67{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 79px;vertical-align: bottom;}
        .td68{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 6px;vertical-align: bottom;}
        .td69{padding: 0px;margin: 0px;width: 167px;vertical-align: bottom;}
        .td70{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 48px;vertical-align: bottom;}
        .td71{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 100px;vertical-align: bottom;}
        .td72{padding: 0px;margin: 0px;width: 168px;vertical-align: bottom;}
        .td73{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 226px;vertical-align: bottom;}
        .td74{padding: 0px;margin: 0px;width: 99px;vertical-align: bottom;}
        .td75{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 92px;vertical-align: bottom;}
        .td76{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 93px;vertical-align: bottom;}
        .td77{padding: 0px;margin: 0px;width: 93px;vertical-align: bottom;}
        .td78{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 126px;vertical-align: bottom;}
        .td79{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 107px;vertical-align: bottom;}
        .td80{padding: 0px;margin: 0px;width: 113px;vertical-align: bottom;}
        .td81{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 222px;vertical-align: bottom;}
        .td82{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 452px;vertical-align: bottom;}
        .td83{padding: 0px;margin: 0px;width: 274px;vertical-align: bottom;}
        .td84{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 140px;vertical-align: bottom;}
        .td85{border-left: #000000 1px solid;border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 199px;vertical-align: bottom;}
        .td86{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 452px;vertical-align: bottom;}
        .td87{padding: 0px;margin: 0px;width: 79px;vertical-align: bottom;}
        .td88{padding: 0px;margin: 0px;width: 129px;vertical-align: bottom;}
        .td89{border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 92px;vertical-align: bottom;}
        .td90{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 33px;vertical-align: bottom;}
        .td91{border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 59px;vertical-align: bottom;}
        .td92{border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 40px;vertical-align: bottom;}
        .td93{border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;}
        .td94{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 11px;vertical-align: bottom;}
        .td95{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 132px;vertical-align: bottom;}
        .td96{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 121px;vertical-align: bottom;}
        .td97{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 134px;vertical-align: bottom;}
        .td98{padding: 0px;margin: 0px;width: 162px;vertical-align: bottom;}
        .td99{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 168px;vertical-align: bottom;}
        .td100{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 215px;vertical-align: bottom;}
        .td101{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 99px;vertical-align: bottom;}

        .tr0{height: 38px;}
        .tr1{height: 19px;}
        .tr2{height: 18px;}
        .tr3{height: 6px;}
        .tr4{height: 5px;}
        .tr5{height: 16px;}
        .tr6{height: 15px;}
        .tr7{height: 10px;}
        .tr8{height: 4px;}
        .tr9{height: 3px;}
        .tr10{height: 17px;}
        .tr11{height: 24px;}
        .tr12{height: 58px;}
        .tr13{height: 40px;}
        .tr14{height: 29px;}
        .tr15{height: 35px;}
        .tr16{height: 7px;}
        .tr17{height: 9px;}
        .tr18{height: 57px;}

        .t0{width: 667px;margin-left: 71px;font: 8px 'Arial';}

    </STYLE>
</HEAD>

<BODY>
<DIV id="page_1">


    <TABLE cellpadding=0 cellspacing=0 class="t0">
        <TR>
            <TD rowspan=2 class="tr0 td0" align="center"><P class="p0 ft0">Извещение</P></TD>
            <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=20 class="tr1 td2" style="padding-top: 10px;"><p class="ft2"><?=$result->recipient?></p></TD>
        </TR>
        <TR>
            <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=10 class="tr2 td4"><P class="p2 ft2"></P></TD>
            <TD class="tr2 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=10 class="tr2 td22"><P class="p1 ft2">(наименование получателя платежа)</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td24"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td25"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td26"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td27"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td28"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td29"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td6"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td7"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td8"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td28"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td11"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td12"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td30"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td31"><P class="p2 ft2"><?=$result->recipient_inn?></P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td32"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td33"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td34">&nbsp;<?=$result->recipient_kpp?></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td33"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td37"><P class="p1 ft2"><?=$result->checking_account?></P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td30"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td24"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td25"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td26"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td38"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td33"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td29"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td39"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td6"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td7"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td40"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td33"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td9"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td41"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=7 class="tr2 td42"><P class="p4 ft2">(ИНН получателя платежа)</P></TD>
            <TD colspan=7 class="tr2 td43"><P class="p5 ft2">(КПП получателя платежа)</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td44"><P class="p2 ft2">(номер счета получателя платежа)</P></TD>
        </TR>
        <TR>
            <TD class="tr4 td14"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td3"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td45"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td46"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td19"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=4 class="tr4 td47"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td48"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td20"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td49"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td50"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td3"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td23"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td13"><P class="p1 ft4">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr5 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr5 td45"><P class="p2 ft2">В</P></TD>
            <TD colspan=12 class="tr5 td51"><p class="ft2"><?=$result->bank?></p></TD>
            <TD colspan=2 class="tr5 td52"><P class="p6 ft2">БИК</P></TD>
            <TD class="tr6 td53"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr6 td54"><P class="p1 ft2"><?=$result->bik?></P></TD>
            <TD class="tr5 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr7 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr7 td55"></TD>
            <TD class="tr7 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td33"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td57"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr8 td14"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr8 td3"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr8 td15"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr9 td10"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td8"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td58"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td26"><P class="p1 ft7">&nbsp;</P></TD>
            <TD colspan=4 class="tr9 td59"><P class="p1 ft7">&nbsp;</P></TD>
            <TD colspan=2 class="tr9 td39"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td5"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td6"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr8 td36"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr8 td17"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr8 td33"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr9 td10"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td11"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td41"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr8 td13"><P class="p1 ft6">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=11 class="tr10 td60"><P class="p1 ft2">(наименование банка получателя платежа)</P></TD>
            <TD class="tr10 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr4 td14"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td3"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td61"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td49"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=4 class="tr4 td47"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td16"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td20"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td20"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=5 class="tr4 td62"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td3"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td23"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td13"><P class="p1 ft4">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=3 class="tr1 td61"><P class="p2 ft2">Кор./сч.</P></TD>
            <TD class="tr1 td63"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td64"><P class="p7 ft2"><?=$result->correspondent_account?></P></TD>
            <TD class="tr2 td53"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td65"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td66"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr1 td67" align="center"><P class="p6 ft2">Код ОКТМО</P></TD>
            <TD class="tr2 td53"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td54"><P class="p1 ft2"><?=$result->oktmo?></P></TD>
            <TD class="tr1 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td15"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td16"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td17"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td63"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td26"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td27"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td9"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td29"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td68"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td35"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td36"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td52"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td9"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td41"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td69"><P class="p8 ft2"><?=$result->kbk?></P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td24"><p class="ft2"><?=$result->payment_name?></p></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td8"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td70"><P class="p1 ft4"></P></TD>
            <TD colspan=4 class="tr4 td59"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=6 class="tr4 td71"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td12"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=7 class="tr2 td72"><P class="p9 ft2">(наименование платежа)</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=8 class="tr2 td73" align="center"><P class="p10 ft2">(код бюджетной классификации)</P></TD>
        </TR>
        <TR>
            <TD class="tr11 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr11 td74"><P class="p2 ft2">Ф.И.О плательщика</P></TD>
            <TD class="tr11 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr5 td75"><P class="p1 ft2">&nbsp;<?=$client_ticket->surname." ".$client_ticket->name." ".$client_ticket->patronymic?></P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td29"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr10 td74"><P class="p2 ft2">Адрес плательщика</P></TD>
            <TD class="tr10 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr5 td75"><P class="p1 ft2">&nbsp;<?="г. ".$client_ticket->city.", ул.".$client_ticket->street.", д.".$client_ticket->house." ".($client_ticket->corpuse ? "корп.".$client_ticket->surname : "")." кв.".$client_ticket->flat?></P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td29"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr5 td76"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr2 td74"><P class="p2 ft2">Сумма иска</P></TD>
            <TD class="tr2 td21"><P class="p11 ft2">0 руб.</P></TD>
            <TD class="tr2 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr2 td77"><P class="p1 ft2">Сумма гос. пошлины</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td78"><P class="p2 ft2">300 руб.</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td45"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td17"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td18"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td19"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td79"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td16"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=5 class="tr3 td62"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td12"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td45"><P class="p2 ft2">Итого</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr2 td80"><P class="p12 ft2">300 руб.</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td62"><P class="p1 ft2"><?="«".date("d")."» ".strftime("%B")." ".date("Y")?></P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=5 class="tr3 td31"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=4 class="tr4 td59"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td48"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=8 class="tr4 td81"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD rowspan=2 class="tr12 td14" align="center"><P class="p13 ft0">Кассир</P></TD>
            <TD class="tr13 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=20 class="tr13 td82"><P class="p2 ft2">С условиями приема указанной в платежном документе суммы, в т.ч. с суммой взимаемой</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=14 class="tr2 td83"><P class="p2 ft2">платы за услуги банка, ознакомлен и согласен.</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=3 class="tr2 td84"><P class="p14 ft2">Подпись плательщика</P></TD>
        </TR>
        <TR>
            <TD class="tr14 td85"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=20 class="tr14 td86"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD rowspan=2 class="tr0 td0" align="center"><P class="p0 ft0">Извещение</P></TD>
            <TD class="tr1 td1"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=20 class="tr1 td2" style="padding-top: 10px;"><p class="ft2"><?=$result->recipient?></p></TD>
        </TR>
        <TR>
            <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=10 class="tr2 td4"><P class="p2 ft2"></P></TD>
            <TD class="tr2 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=10 class="tr2 td22"><P class="p1 ft2">(наименование получателя платежа)</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td24"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td25"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td26"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td27"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td28"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td29"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td6"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td7"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td8"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td28"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td11"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td12"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td30"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td31"><P class="p2 ft2"><?=$result->recipient_inn?></P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td32"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td33"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td34">&nbsp;<?=$result->recipient_kpp?></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td33"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td37"><P class="p1 ft2"><?=$result->checking_account?></P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td30"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td24"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td25"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td26"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td38"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td33"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td29"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td39"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td6"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td7"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td40"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td33"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td9"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td41"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=7 class="tr2 td42"><P class="p4 ft2">(ИНН получателя платежа)</P></TD>
            <TD colspan=7 class="tr2 td43"><P class="p5 ft2">(КПП получателя платежа)</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td44"><P class="p2 ft2">(номер счета получателя платежа)</P></TD>
        </TR>
        <TR>
            <TD class="tr4 td14"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td3"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td45"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td46"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td19"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=4 class="tr4 td47"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td48"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td20"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td49"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td50"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td3"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td23"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td13"><P class="p1 ft4">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr5 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr5 td45"><P class="p2 ft2">В</P></TD>
            <TD colspan=12 class="tr5 td51"><p class="ft2"><?=$result->bank?></p></TD>
            <TD colspan=2 class="tr5 td52"><P class="p6 ft2">БИК</P></TD>
            <TD class="tr6 td53"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr6 td54"><P class="p1 ft2"><?=$result->bik?></P></TD>
            <TD class="tr5 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr7 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr7 td55"></TD>
            <TD class="tr7 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td33"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td57"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr8 td14"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr8 td3"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr8 td15"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr9 td10"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td8"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td58"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td26"><P class="p1 ft7">&nbsp;</P></TD>
            <TD colspan=4 class="tr9 td59"><P class="p1 ft7">&nbsp;</P></TD>
            <TD colspan=2 class="tr9 td39"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td5"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td6"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr8 td36"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr8 td17"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr8 td33"><P class="p1 ft6">&nbsp;</P></TD>
            <TD class="tr9 td10"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td11"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr9 td41"><P class="p1 ft7">&nbsp;</P></TD>
            <TD class="tr8 td13"><P class="p1 ft6">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=11 class="tr10 td60"><P class="p1 ft2">(наименование банка получателя платежа)</P></TD>
            <TD class="tr10 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr4 td14"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td3"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td61"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td49"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=4 class="tr4 td47"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td16"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td20"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td20"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=5 class="tr4 td62"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td3"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td23"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td13"><P class="p1 ft4">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=3 class="tr1 td61"><P class="p2 ft2">Кор./сч.</P></TD>
            <TD class="tr1 td63"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td64"><P class="p7 ft2"><?=$result->correspondent_account?></P></TD>
            <TD class="tr2 td53"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td65"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td66"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr1 td67" align="center"><P class="p6 ft2">Код ОКТМО</P></TD>
            <TD class="tr2 td53"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td54"><P class="p1 ft2"><?=$result->oktmo?></P></TD>
            <TD class="tr1 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td15"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td16"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td17"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td63"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td26"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td27"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td9"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td29"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td68"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td35"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td36"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td52"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td9"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td41"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr2 td69"><P class="p8 ft2"><?=$result->kbk?></P></TD>
            <TD class="tr2 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td24"><p class="ft2"><?=$result->payment_name?></p></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td8"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td70"><P class="p1 ft4"></P></TD>
            <TD colspan=4 class="tr4 td59"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=6 class="tr4 td71"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr4 td12"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=7 class="tr2 td72"><P class="p9 ft2">(наименование платежа)</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=8 class="tr2 td73" align="center"><P class="p10 ft2">(код бюджетной классификации)</P></TD>
        </TR>
        <TR>
            <TD class="tr11 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr11 td74"><P class="p2 ft2">Ф.И.О плательщика</P></TD>
            <TD class="tr11 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr11 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr5 td75"><P class="p1 ft2">&nbsp;<?=$client_ticket->surname." ".$client_ticket->name." ".$client_ticket->patronymic?></P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td29"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr10 td74"><P class="p2 ft2">Адрес плательщика</P></TD>
            <TD class="tr10 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr5 td75"><P class="p1 ft2">&nbsp;<?="г. ".$client_ticket->city.", ул.".$client_ticket->street.", д.".$client_ticket->house." ".($client_ticket->corpuse ? "корп.".$client_ticket->surname : "")." кв.".$client_ticket->flat?></P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td29"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr5 td76"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr5 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>

        <TR>
            <TD class="tr2 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr2 td74"><P class="p2 ft2">Сумма иска</P></TD>
            <TD class="tr2 td21"><P class="p11 ft2">0 руб.</P></TD>
            <TD class="tr2 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr2 td77"><P class="p1 ft2">Сумма гос. пошлины</P></TD>
            <TD class="tr2 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr2 td78"><P class="p2 ft2">300 руб.</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td14"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td45"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td17"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td18"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td19"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td5"><P class="p1 ft4">&nbsp;</P></TD>
            <TD colspan=3 class="tr4 td79"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td16"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=5 class="tr3 td62"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr3 td3"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr4 td12"><P class="p1 ft4">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft3">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr10 td45"><P class="p2 ft2">Итого</P></TD>
            <TD class="tr10 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr10 td80"><P class="p12 ft2">300 руб.</P></TD>
            <TD class="tr10 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=5 class="tr10 td62"><P class="p1 ft2">«4» ноября 2021</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr16 td14"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr16 td3"><P class="p1 ft8">&nbsp;</P></TD>
            <TD colspan=5 class="tr16 td31"><P class="p1 ft8">&nbsp;</P></TD>
            <TD colspan=4 class="tr3 td59"><P class="p1 ft3">&nbsp;</P></TD>
            <TD colspan=2 class="tr16 td48"><P class="p1 ft8">&nbsp;</P></TD>
            <TD colspan=8 class="tr3 td81"><P class="p1 ft3">&nbsp;</P></TD>
            <TD class="tr16 td13"><P class="p1 ft8">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD rowspan=2 class="tr18 td14" align="center"><P class="p13 ft0">Кассир</P></TD>
            <TD class="tr13 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=20 class="tr13 td82"><P class="p2 ft2">С условиями приема указанной в платежном документе суммы, в т.ч. с суммой взимаемой</P></TD>
        </TR>
        <TR>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=14 class="tr10 td83"><P class="p2 ft2">платы за услуги банка, ознакомлен и согласен.</P></TD>
            <TD class="tr10 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td23"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr10 td13"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td56"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td35"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td17"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=3 class="tr1 td84"><P class="p14 ft2">Подпись плательщика</P></TD>
        </TR>
        <TR>
            <TD class="tr14 td85"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td24"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td58"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td26"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td29"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td5"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr14 td40"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
    </TABLE>
</DIV>
</BODY>
</HTML>
