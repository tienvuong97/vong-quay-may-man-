<script>
    
           
    // Create new wheel object specifying the parameters at creation time.
    let theWheel = new Winwheel({
        'numSegments': <?php
                        $loop = new WP_Query(array(
                            'post_type' => 'giai_thuong',
                            'orderby'           => 'meta_value_num',
                            'order'             => 'ASC'
                        ));
                        echo $loop->found_posts
                        ?>, // Specify number of segments.
        'outerRadius': 212, // Set outer radius so wheel fits inside the background.
        'textFontSize': 12, // Set font size as desired.
        'innerRadius': 40,
        'strokeStyle': '#c90204',
        'segments': // Define segments including colour and text.
            [
                <?php $loop = new WP_Query(array(
                    'post_type' => 'giai_thuong',
                    'orderby'           => 'meta_value_num',
                    'order'             => 'ASC'
                ));
                $giai_thuongs = ($loop->posts);

                ?>
                <?php foreach ($giai_thuongs as $key => $item) {

                    render_segement($item);
                } ?>
            ],
        'animation': // Specify the animation to use.
        {
            'type': 'spinToStop',
            'duration': 15,
            'spins': 8,
            'callbackFinished': alertPrize,
            'callbackSound': playSound, // Function to call when the tick sound is to be triggered.
            'soundTrigger': 'pin' // Specify pins are to trigger the sound, the other option is 'segment'.
        },
        'pins': {
            'number': 8 // Number of pins. They space evenly around the wheel.
        }
    });

    // -----------------------------------------------------------------
    // This function is called when the segment under the prize pointer changes
    // we can play a small tick sound here like you would expect on real prizewheels.
    // -----------------------------------------------------------------
    let audio = new Audio('<?php bloginfo('template_directory') ?>/images/tick.mp3'); // Create audio object and load tick.mp3 file.

    function playSound() {
        // Stop and rewind the sound if it already happens to be playing.
        audio.pause();
        audio.currentTime = 0;

        // Play the sound.
        audio.play();
    }

    // -------------------------------------------------------
    // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters
    // note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
    // -------------------------------------------------------
    function alertPrize(indicatedSegment) {
        document.getElementById('thongbao').innerHTML += '<div id="table-thongbao" class="d-end table-thongbao"><img src="<?php bloginfo('template_directory') ?>/images/khungTrungGiai.png" alt=""><span>' + indicatedSegment.text + '</span></div>';
        // document.getElementsByClassName("table-thongbao").css("display","flex");
        canXoay = false





    }

    // =======================================================================================================================
    // Code below for the power controls etc which is entirely optional. You can spin the wheel simply by
    // calling theWheel.startAnimation();
    // =======================================================================================================================
    let wheelPower = 0;
    let wheelSpinning = false;


    let canXoay = false;
    // -------------------------------------------------------
    // Click handler for spin button.
    // -------------------------------------------------------
    function startSpin() {

        theWheel.stopAnimation(false);

        // Reset the rotation angle to less than or equal to 360 so spinning again works as expected.
        // Setting to modulus (%) 360 keeps the current position.
        theWheel.rotationAngle = theWheel.rotationAngle % 360;

        // Start animation.
        theWheel.startAnimation();

        var myobj = document.getElementById("table-thongbao");
        if (myobj) {
            myobj.remove();
        }

    }
    $("#spin_button").on("click", function(e) {
        e.preventDefault();
        // goi api check user

        if (canXoay) {
            startSpin()
        } else {
            $("#exampleModal").modal()
        }
    });
    $(".btn_send").on("click", function(e) {
        e.preventDefault();
        let _this = this
       
        // 
        if ($('#form_contact #name').val() === '') {
            alert('Vui lòng nhập tên.');
            $('#name').focus();
            return false;
        } else if ($('#form_contact #phone-number').val() === '') {
            alert('Vui lòng nhập sdt');
            $('#phone-number').focus();
            return false;
        }
        else {
            var data = {
                'action': 'cvf_send_message',
                'name': $('#form_contact #name').val(),
                'phone-number': $('#form_contact #phone-number').val(),
                "title": "Thông tin quay thưởng",
                "type": 0
            };
            console.log("data: ", data);
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
            $.post(ajaxurl, data, function(response) {

                if (response === 'success') {
                    $("#modalAlert").modal();
                    $('#form_contact #name').val('');
                    $('#form_contact #phone-number').val('');
                    $('#exampleModal').modal('toggle');
                    canXoay = true

                }

            });
        }
    });
</script>
</body>

</html>