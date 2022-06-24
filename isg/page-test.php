<?php
/**
 * template name: Test 1
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradiz
 */
get_header();
?>

<div class="tempate-box template-change template-join" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-dots-white.jpg);">
    <div class="s-container">
<style>
    .table-x thead {
    background: #670001;
}
.table-x thead th {
    color: #fff;
    font-weight: 500;
    font-size: 18px;
    padding: 10px 20px;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
    text-align: center;
}
.table-x td {
    color: #000;
    font-weight: 500;
    font-size: 15px;
    padding: 10px 20px;
    background: #d2d2d2;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
}
.table-x tr td:first-child {
    text-align: center;
}
</style>
<table id="table-2" class="table-2 table-x">
  <thead>
    <tr>
        <th>MATERIAL</th>
        <th>SYMBOL</th>
        <th>ROLL MATERIAL</th>
        <th>C</th>
        <th>SI</th>
        <th>NI</th>
        <th>Cr</th>
        <th>Mo</th>
        <th>Mg</th>
        <th>Hardness HSC</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>CLEAR CHILLED IRON</td>
        <td>CL</td>
        <td>LOW ALLOY CHILLED</td>
        <td>3.1-3.4</td>
        <td>0.3-0.7</td>
        <td>1.2-1.8</td>
        <td>0.4-0.7</td>
        <td>-</td>
        <td>-</td>
        <td>65-72</td>
    </tr>
    <tr>
        <td>CLEAR CHILLED IRON</td>
        <td>CM</td>
        <td>MEDIUM ALLOY CHILLED</td>
        <td>3.1-3.4</td>
        <td>0.25-0.6</td>
        <td>2.0-2.5</td>
        <td>0.5-0.9</td>
        <td>0.25-0.35</td>
        <td>-</td>
        <td>65-72</td>
    </tr>
    <tr>
        <td>CLEAR CHILLED IRON</td>
        <td>CR</td>
        <td>ALLOY CHILLED RUBBER ROLLS</td>
        <td>3.2-3.6</td>
        <td>0.5-0.8</td>
        <td>1.2-1.8</td>
        <td>0.3-0.5</td>
        <td>0.25-0.35</td>
        <td>-</td>
        <td>65-75</td>
    </tr>
    <tr>
        <td>CLEAR CHILLED IRON</td>
        <td>CX</td>
        <td>HIGH ALLOY DUPLEX</td>
        <td>3.0-3.4</td>
        <td>0.4-0.6</td>
        <td>2.2-4.5</td>
        <td>0.8-1.8</td>
        <td>0.3-0.5</td>
        <td>-</td>
        <td>70-85</td>
    </tr>
    <tr>
        <td>INDEFINITE CHILLED IRON</td>
        <td>GL</td>
        <td>LOW ALLOY GRAIN</td>
        <td>2.9-3-3</td>
        <td>0.6-0.9</td>
        <td>2.4-3.0</td>
        <td>0.9-1.3</td>
        <td>0.25-0.35</td>
        <td>-</td>
        <td>72-78</td>
    </tr>
    <tr>
        <td>INDEFINITE CHILLED IRON</td>
        <td>GM</td>
        <td>MEDIUM ALLOY GRAIT</td>
        <td>3.2-3.4</td>
        <td>0.4-0.6</td>
        <td>2.8-4.4</td>
        <td>1.0-1.8</td>
        <td>0.3-0.5</td>
        <td>-</td>
        <td>75-85</td>
    </tr>
    <tr>
        <td>INDEFINITE CHILLED IRON</td>
        <td>GX</td>
        <td>HIGH ALLOY DUPLEX</td>
        <td>3.2-3.4</td>
        <td>0.6-0.9</td>
        <td>3.2-4.4</td>
        <td>1.2-1.8</td>
        <td>0.3-0.5</td>
        <td>-</td>
        <td>75-85</td>
    </tr>
    <tr>
        <td>INDEFINITE CHILLED IRON</td>
        <td>GCR</td>
        <td>HIGH Cr DUPLEX</td>
        <td>2.5-2.8</td>
        <td>0.5-1.0</td>
        <td>1.0-2.0</td>
        <td>13-16</td>
        <td>0.5-0.8</td>
        <td>-</td>
        <td>68-75</td>
    </tr>
    <tr>
        <td>DUCTILE CAST IRON</td>
        <td>DR</td>
        <td>ALLOY DUCTILE</td>
        <td>3.0-3.5</td>
        <td>1.6-2.0</td>
        <td>1.2-1.8</td>
        <td>0.2-0.4</td>
        <td>0.25-0.35</td>
        <td>0.035-0.07</td>
        <td>45-55</td>
    </tr>
    <tr>
        <td>DUCTILE CAST IRON</td>
        <td>DRG</td>
        <td>ALLOY DUCTILE GROOVED CHILLED<span>GC</span></td>
        <td>3.0-3.5</td>
        <td>1.6-2.0</td>
        <td>1.2-1.8</td>
        <td>0.2-0.4</td>
        <td>0.25-0.35</td>
        <td>0.035-0.07</td>
        <td>58-66</td>
    </tr>
    <tr>
        <td>DUCTILE CAST IRON</td>
        <td>DI</td>
        <td>ALLOY DUCTILE</td>
        <td>3.0-3.4</td>
        <td>1.3-1.5</td>
        <td>1.6-2.0</td>
        <td>0.4-0.7</td>
        <td>0.25-0.35</td>
        <td>0.035-0.07</td>
        <td>58-66</td>
    </tr>
    <tr>
        <td>DUCTILE CAST IRON</td>
        <td>DIG</td>
        <td>ALLOY DUCTILE GROOVED CHILLED<span>GC</span></td>
        <td>3.0-3.4</td>
        <td>1.3-1.5</td>
        <td>1.6-2.0</td>
        <td>0.4-0.7</td>
        <td>0.25-0.35</td>
        <td>0.035-0.07</td>
        <td>65-75</td>
    </tr>
    <tr>
        <td>DUCTILE CAST IRON</td>
        <td>DF</td>
        <td>ALLOY DUCTILE</td>
        <td>3.1-3.4</td>
        <td>1.2-1.4</td>
        <td>2.0-2.4</td>
        <td>0.6-0.9</td>
        <td>0.25-0.35</td>
        <td>0.035-0.07</td>
        <td>65-75</td>
    </tr>
    <tr>
        <td>DUCTILE CAST IRON</td>
        <td>DFG</td>
        <td>ALLOY DUCTILE GROOVED CHILLED<span>GC</span></td>
        <td>3.1-3.4</td>
        <td>1.2-1.4</td>
        <td>2.0-2.4</td>
        <td>0.6-0.9</td>
        <td>0.25-0.35</td>
        <td>0.035-0.07</td>
        <td>65-75</td>
    </tr>
    <tr>
        <td>DUCTILE CAST IRON</td>
        <td>ACD</td>
        <td>ACICULAR DUCTILE</td>
        <td>3.0-3.4</td>
        <td>1.3-1.5</td>
        <td>3.8-4.2</td>
        <td>0.3-0.5</td>
        <td>0.9-1.1</td>
        <td>0.035-0.07</td>
        <td>70-85</td>
    </tr>
  </tbody>
</table>
    </div>
</div>
<?php get_footer(); ?>