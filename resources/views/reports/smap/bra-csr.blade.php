<style>
    @page {
        size: landscape;
    }
    .border-report {
        border: 1px solid black;
        text-align: center;
    }
    table{
        font-family: Calibri, sans-serif;
        color: black;
        border-spacing: initial;
    }
    body{
        border: 1px solid black;
    }
</style>
<table style="width: 100%;">
    <tbody>
    <tr>
        <td colspan="18" style="width: 99.7151%;">
            <div data-empty="true" style="text-align: center;"><strong>FORM BRIBERY RISK ASSESSMENT</strong></div>
        </td>
    </tr>
    <tr>
        <td colspan="18" style="width: 99.7151%;">
            <div data-empty="true" style="text-align: center;"><strong>PT SEMEN INDONESIA (PERSERO) Tbk</strong></div>
        </td>
    </tr>
    <tr>
        <td style="width: 4.2735%;"><br></td>
        <td colspan="3" style="width: 19.2343%;">Process</td>
        <td colspan="4" style="width: 28.4865%;">: CSR Induk</td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.016%;"><br></td>
        <td style="width: 5.0516%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2736%;"><br></td>
        <td colspan="4" style="width: 21.7949%;">
            <div style="text-align: right;"><strong>{{$business_document->document_number}}</strong></div>
        </td>
    </tr>
    <tr>
        <td style="width: 4.2735%;"><br></td>
        <td colspan="3" style="width: 19.2343%;">Revisi ke-</td>
        <td colspan="4" style="width: 28.4865%;">: 0</td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.016%;"><br></td>
        <td style="width: 5.0516%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2736%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.6505%;"><br></td>
        <td style="width: 5.5556%;"><br></td>
        <td style="width: 5.3814%;"><br></td>
    </tr>
    <tr>
        <td style="width: 4.2735%;"><br></td>
        <td colspan="3" style="width: 19.2343%;">Tanggal</td>
        <td colspan="4" style="width: 28.4865%;">: {{$business_document->created_at}}</td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.016%;"><br></td>
        <td style="width: 5.0516%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2736%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.6505%;"><br></td>
        <td style="width: 5.5556%;"><br></td>
        <td style="width: 5.3814%;"><br></td>
    </tr>
    <tr>
        <td style="width: 4.2735%;" class="border-report">No<br></td>
        <td style="width: 6.5527%;" class="border-report">Process/Activity<br></td>
        <td style="width: 6.25%;" class="border-report">Syarat Anti Suap<br></td>
        <td style="width: 6.2856%;" class="border-report">Risiko Penyuapan<br></td>
        <td style="width: 6.2642%;" class="border-report">Dampak<br></td>
        <td style="width: 9.4872%;" class="border-report">Sebab Risiko<br></td>
        <td style="width: 8.4704%;" class="border-report">Pengendalian/Kontrol Internal<br></td>
        <td style="width: 4.2735%;" class="border-report">Likehood<br></td>
        <td style="width: 4.2735%;" class="border-report">Consequences<br></td>
        <td style="width: 4.2735%;" class="border-report">Kriteria Dampak<br></td>
        <td style="width: 5.016%;" class="border-report">Risk Level<br></td>
        <td style="width: 5.0516%;" class="border-report">Mitigasi Proaktiv<br></td>
        <td style="width: 4.2735%;" class="border-report">Likehood Target<br></td>
        <td style="width: 4.2736%;" class="border-report">Consequences Target<br></td>
        <td style="width: 4.2735%;" class="border-report">Risk Level Target<br></td>
        <td style="width: 5.6505%;" class="border-report">Peluang<br></td>
        <td style="width: 5.5556%;" class="border-report">Personil<br></td>
        <td style="width: 5.3814%;" class="border-report">Catatan<br></td>
    </tr>
    @foreach($bribery_risk as $key=>$item)
    <tr>
        <td style="width: 4.2735%;" class="border-report">{{++$key}}<br></td>
        <td style="width: 6.5527%;" class="border-report">{{$item->atp_process->activity}}<br></td>
        <td style="width: 6.25%;" class="border-report">{{$item->requirements}}<br></td>
        <td style="width: 6.2856%;" class="border-report">{{$item->bribery_risk}}<br></td>
        <td style="width: 6.2642%;" class="border-report">{{$item->impact}}<br></td>
        <td style="width: 9.4872%;" class="border-report">{{$item->risk_causes}}<br></td>
        <td style="width: 8.4704%;" class="border-report">{{$item->internal_control}}<br></td>
        <td style="width: 4.2735%;" class="border-report">{{$item->l}}<br></td>
        <td style="width: 4.2735%;" class="border-report">{{$item->c}}<br></td>
        <td style="width: 4.2735%;" class="border-report">{{$item->criteria_impact}}<br></td>
        <td style="width: 5.016%;" class="border-report">{{ucwords($item->risk_level)}}<br></td>
        <td style="width: 5.0516%;" class="border-report">{{$item->proactive_mitigation}}<br></td>
        <td style="width: 4.2735%;" class="border-report">{{$item->l_target}}<br></td>
        <td style="width: 4.2736%;" class="border-report">{{$item->c_target}}<br></td>
        <td style="width: 4.2735%;" class="border-report">{{ucwords($item->risk_level_target)}}<br></td>
        <td style="width: 5.6505%;" class="border-report">{{$item->opportunity}}<br></td>
        <td style="width: 5.5556%;" class="border-report">{{$item->personal_identification->name}}<br></td>
        <td style="width: 5.3814%;" class="border-report">{{$item->description}}<br></td>
    </tr>
    @endforeach
    <tr>
        <td colspan="6" style="width: 39.0313%;"><strong>Prepared by,</strong></td>
        <td colspan="6" style="width: 31.339%;"><strong>Reviewed by,</strong></td>
        <td style="width: 4.2735%;"><br></td>
        <td colspan="5" style="width: 25.0712%;"><strong>Approved by,</strong></td>
    </tr>
    <tr>
        <td colspan="6" style="width: 39.0313%;"><br><br><br></td>
        <td colspan="6" style="width: 31.339%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td colspan="5" style="width: 25.0712%;"><br></td>
    </tr>
    <tr>
        <td colspan="6" style="width: 39.0313%;"><strong><u>Risk Creator</u></strong></td>
        <td colspan="6" style="width: 31.339%;"><strong><u>Risk Reviewer</u></strong></td>
        <td style="width: 4.2735%;"><br></td>
        <td colspan="5" style="width: 25.0712%;"><strong><u>Risk Approver</u></strong></td>
    </tr>
    <tr>
        <td colspan="6" style="width: 39.0313%;"><strong>Tri Agung Prasetya</strong></td>
        <td colspan="6" style="width: 31.339%;"><strong>Amin blabla</strong></td>
        <td style="width: 4.2735%;"><br></td>
        <td colspan="5" style="width: 25.0712%;"><strong>Edy Saraya</strong></td>
    </tr>
    <tr>
        <td colspan="6" style="width: 39.0313%;"><strong>(CSR Risk &amp; Performance Office)</strong></td>
        <td colspan="6" style="width: 31.339%;"><strong>(CSR Comdev &amp; Partnership)</strong></td>
        <td style="width: 4.2735%;"><br></td>
        <td colspan="5" style="width: 25.0712%;"><strong>(GM of CSR)</strong></td>
    </tr>
    <tr>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 6.5527%;"><br></td>
        <td style="width: 6.25%;"><br></td>
        <td style="width: 6.2856%;"><br></td>
        <td style="width: 6.2642%;"><br></td>
        <td style="width: 9.4872%;"><br></td>
        <td style="width: 8.4704%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.016%;"><br></td>
        <td style="width: 5.0516%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2736%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.6505%;"><br></td>
        <td style="width: 5.5556%;"><br></td>
        <td style="width: 5.3814%;"><br></td>
    </tr>
    <tr>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 6.5527%;"><br></td>
        <td style="width: 6.25%;"><br></td>
        <td style="width: 6.2856%;"><br></td>
        <td style="width: 6.2642%;"><br></td>
        <td style="width: 9.4872%;"><br></td>
        <td style="width: 8.4704%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.016%;"><br></td>
        <td style="width: 5.0516%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 4.2736%;"><br></td>
        <td style="width: 4.2735%;"><br></td>
        <td style="width: 5.6505%;"><br></td>
        <td style="width: 5.5556%;"><br></td>
        <td style="width: 5.3814%;"><br></td>
    </tr>
    <tr>
        <td colspan="18" style="width: 99.5726%;"><strong>Catatan dari</strong><br><strong>.....</strong></td>
    </tr>
    </tbody>
</table>
