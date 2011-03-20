<div id='login_form'>
	<h1>Please login</h1>
	<?php 
		echo form_open('login/process_login'); 
		echo form_input(array('name' => 'username', 'placeholder' => 'Username'));
		echo form_password(array('name' => 'password', 'placeholder' => 'Password'));
		echo form_submit('submit', 'Login');

		echo anchor('login/signup', 'Create Account');
	?>
</div>


 Heating Fuels   	Electricity	Mains Gas	Bottled Gas	Wood	Coal	Solar Power	Other Fuel(s)	No Fuels Used in this Dwelling	Total Dwellings (Includes Dwellings Specifying One or More Fuel Types Used to Heat Dwelling and No Fuels Used)	Total Dwellings
  Area   	 	 	 	 	 	 	 	 	 	 
Wanganui District	9,015	7,740	4,005	5,520	573	108	78	273	16,047	16,695
Rangitikei District	3,270	537	1,842	4,236	297	42	30	45	5,451	5,634
Manawatu District	5,364	1,992	3,258	6,168	348	69	69	153	9,735	10,017
Palmerston North City	15,552	14,034	5,835	6,165	612	159	156	510	25,431	26,268
Tararua District	3,801	195	2,442	5,391	222	54	51	51	6,495	6,663
Horowhenua District	6,213	3,630	3,276	5,454	414	87	66	156	11,169	11,484
Kapiti Coast District	12,579	2,964	5,436	7,365	741	180	117	195	16,989	17,391
Porirua City	10,791	2,847	4,599	5,529	1,011	159	156	417	14,247	14,868
Upper Hutt City	9,489	4,743	3,225	4,884	522	96	120	180	12,927	13,185
Lower Hutt City	25,338	13,356	7,989	10,185	1,962	225	270	564	33,534	34,584
Wellington City	51,048	19,722	10,098	13,956	3,144	387	468	1,494	59,931	62,475
Masterton District	5,235	57	3,999	6,459	477	72	81	81	8,487	8,667
Carterton District	1,494	12	1,077	2,184	135	24	18	21	2,568	2,631
South Wairarapa District	2,034	12	1,263	2,880	201	33	27	18	3,381	3,486
Tasman District	9,675	75	4,272	10,644	768	246	159	246	15,081	15,744
Nelson City	11,862	111	5,238	8,178	900	222	183	324	15,606	16,122
Marlborough District	10,902	90	4,026	9,480	1,149	180	204	174	14,805	15,321
Kaikoura District	843	6	258	1,047	87	15	27	12	1,278	1,344
Buller District	2,088	24	786	2,886	2,622	30	33	42	3,777	3,960
Grey District	2,877	30	1,314	3,678	3,465	33	51	42	4,815	4,971
Westland District	1,758	24	723	2,301	1,488	30	48	39	2,982	3,135
Hurunui District	2,646	24	855	3,273	417	42	57	21	3,786	3,900
Waimakariri District	10,266	96	3,984	8,922	1,140	129	159	75	13,335	13,602
Christchurch City	104,202	1,110	38,595	47,274	7,986	1,125	1,650	1,506	119,508	122,754