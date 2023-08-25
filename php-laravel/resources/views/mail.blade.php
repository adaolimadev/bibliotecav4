<html>
	<head>
		<meta charset="utf-8">
		<style>
			body{ font-family: Arial; font-size: 14px; background-image: url("http://www.balflex.com.br/images/boa_fundo.jpg?"); background-repeat: repeat; color:#022d49; margin: 30px; padding: 0px; }
			p{ line-height: 35px; }
			ul li{ line-height: 30px; padding-left: 15px; }
		</style>
	</head>
	<body>
		<table align="center" style='width: 720px; margin: auto; padding: 2px; border:1px solid #dededa; background-color: white; box-shadow: 0px 1px 10px #A4A4A4;'>
		    <tr>
		    	<td style='border-bottom: 2px solid #FFA250;'>
		    		<img src="http://www.balflex.com.br/images/boa_topon.jpg"/>
		    	</td>
		    </tr>
		    <tr>
		    	<td style='vertical-align: top; padding: 20px 30px 20px 30px; background-color: white; border-bottom: 2px solid #FFA250;'>
                    @if( isset( $borba ))
                        {!!$borba!!}
                    @endif
				</td>
			</tr>
			<tr>
				<td id="rodape">
					<img src="http://www.balflex.com.br/images/boa_rodape.jpg"/>
				</td>
			</tr>
		</table>
	</body>
</html>