
<div id="showData"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            const load = () => {
                $.ajax({
                    url:"index.php",
                    type:"POST",
                    success:function(data){
                        $("#showData").html(data);
                    }
                });
            }
            load();
        });
    </script>
