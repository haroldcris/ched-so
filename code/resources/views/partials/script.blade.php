<!-- Bootstrap and necessary plugins -->

<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/pace-progress/pace.min.js"></script>


<script src="/js/coreui.min.js"></script>


<script>
 document.addEventListener('submit', function (){
	let b = this.querySelector('[type="submit"]');
	let i = b.getElementsByTagName('i');

	b.setAttribute('disabled','');

	if(i.length != 0)
	    i[0].setAttribute('class','fa fa-spin fa-spinner');
});        
</script>