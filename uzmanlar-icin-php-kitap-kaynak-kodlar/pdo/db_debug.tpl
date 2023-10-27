{capture name='_smarty_debug' assign=debug_output}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>DB Debug Console</title>
<style type="text/css">

body, h1, h2, td, th, p {
    font-family: sans-serif;
    font-weight: normal;
    font-size: 0.9em;
    margin: 1px;
    padding: 0;
}

h1 {
    margin: 0;
    text-align: left;
    padding: 2px;
    background-color: #f0c040;
    color:  black;
    font-weight: bold;
    font-size: 1.2em;
 }

h2 {
    background-color: #9B410E;
    color: white;
    text-align: left;
    font-weight: bold;
    padding: 2px;
    border-top: 1px solid black;
}

body {
    background: black; 
}

p, table, div {
    background: #f0ead8;
} 

p {
    margin: 0;
    font-style: italic;
    text-align: center;
}

table {
    width: 100%;
}

th, td {
    font-family: monospace;
    /*vertical-align: top;*/
	padding:5px;
    text-align: left;
   
}

td {
    color: green;
}

.odd {
    background-color: #eeeeee;
}

.even {
    background-color: #fafafa;
}

.exectime {
    font-size: 0.8em;
    font-style: italic;
}

#table_assigned_vars th {
    color: blue;
}

#table_config_vars th {
    color: maroon;
}

</style>
</head>
<body>
<h1>Database Debug</h1>
<table>
	<tr style="background-color:#C2C8CE">
		<th>No</th>
		<th>query</th>
		<th style="width:15%">param</th>
		<th>Total Count</th>
	</tr>
	{section name=n loop=$queryArr}
	    <tr style="background-color:{if $smarty.section.n.index%2==0}#EFF6FB{else}#FFFFFF{/if}">
	    	<td>{$smarty.section.n.index+1}</td>
	    	<td><code>{$queryArr[n]}</code></td>
	    	<td>
	    		<pre>{$paramArr[n]|var_export}</pre>
	    	</td>
	    	<td>{$queryTotalCount[$smarty.section.n.index]}</td>
	    </tr>
	{/section}
</table>
</body>
</html>
{/capture}
<script type="text/javascript">
{$id = $template_name|default:''|md5}
    _smarty_console = window.open("","console{$id}","width=880,height=600,resizable,scrollbars=yes");
    _smarty_console.document.write("{$debug_output|escape:'javascript' nofilter}");
    _smarty_console.document.close();
</script>