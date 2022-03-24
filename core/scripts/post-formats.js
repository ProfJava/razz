/*
 *  JS for posts metaboxes.
 */
jQuery(document).ready(function () {
    /*''''''''''''''''''''''''''''''''''''' /   Standard Optns  */
    "use strict";
    var standerOptions = jQuery('#no_options'); //metabox ID
    var standerTrigger = jQuery('#post-format-0'); //post format ID
    standerOptions.css('display', 'none');

    /*''''''''''''''''''''''''''''''''''''' /   Quote Optns  */

    var quoteOptions = jQuery('#fw-options-box-quote');
    var quoteTrigger = jQuery('#post-format-quote');
    quoteOptions.css('display', 'none');

    /*''''''''''''''''''''''''''''''''''''' /   Video Optns  */

    var videoOptions = jQuery('#fw-options-box-video');
    var videoTrigger = jQuery('#post-format-video');
    videoOptions.css('display', 'none');

    /*''''''''''''''''''''''''''''''''''''' /   Gallery Optns  */

    var galleryOptions = jQuery('#fw-options-box-gallery');
    var galleryTrigger = jQuery('#post-format-gallery');
    galleryOptions.css('display', 'none');

    /*''''''''''''''''''''''''''''''''''''' /   Link Optns  */

    var linkOptions = jQuery('#fw-options-box-link');
    var linkTrigger = jQuery('#post-format-link');

    linkOptions.css('display', 'none');

    /*''''''''''''''''''''''''''''''''''''' /   Audio Optns  */

    var audioOptions = jQuery('#fw-options-box-audio');
    var audioTrigger = jQuery('#post-format-audio');
    audioOptions.css('display', 'none');

    /*''''''''''''''''''''''''''''''''''''' /   Image Optns  */

    var imageOptions = jQuery('#no_options');
    var imageTrigger = jQuery('#post-format-image');
    imageOptions.css('display', 'none');

    /*''''''''''''''''''''''''''''''''''''' /   Core  */

    var group = jQuery('#post-formats-select input');
    group.change(function () {
        if (jQuery(this).val() == 'video') {
            videoOptions.css('display', 'block');
            reyHideAll(videoOptions);

        } else if (jQuery(this).val() == '0') {
            standerOptions.css('display', 'block');
            reyHideAll(standerOptions);

        } else if (jQuery(this).val() == 'quote') {
            quoteOptions.css('display', 'block');
            reyHideAll(quoteOptions);

        } else if (jQuery(this).val() == 'gallery') {
            galleryOptions.css('display', 'block');
            reyHideAll(galleryOptions);

        } else if (jQuery(this).val() == 'link') {
            linkOptions.css('display', 'block');
            reyHideAll(linkOptions);

        } else if (jQuery(this).val() == 'image') {
            imageOptions.css('display', 'block');
            reyHideAll(imageOptions);

        } else if (jQuery(this).val() == 'audio') {
            audioOptions.css('display', 'block');
            reyHideAll(audioOptions);

        } else {
            standerOptions.css('display', 'none');
            quoteOptions.css('display', 'none');
            linkOptions.css('display', 'none');
            imageOptions.css('display', 'none');
            videoOptions.css('display', 'none');
            audioOptions.css('display', 'none');
            galleryOptions.css('display', 'none');
        }
    });

    if (standerTrigger.is(':checked'))
        standerOptions.css('display', 'block');

    if (quoteTrigger.is(':checked'))
        quoteOptions.css('display', 'block');

    if (videoTrigger.is(':checked'))
        videoOptions.css('display', 'block');

    if (galleryTrigger.is(':checked'))
        galleryOptions.css('display', 'block');

    if (imageTrigger.is(':checked'))
        imageOptions.css('display', 'block');

    if (linkTrigger.is(':checked'))
        linkOptions.css('display', 'block');

    if (audioTrigger.is(':checked'))
        audioOptions.css('display', 'block');

    function reyHideAll(notThisOne) {
        videoOptions.css('display', 'none');
        standerOptions.css('display', 'none');
        quoteOptions.css('display', 'none');
        galleryOptions.css('display', 'none');
        imageOptions.css('display', 'none');
        audioOptions.css('display', 'none');
        linkOptions.css('display', 'none');
        notThisOne.css('display', 'block');
    }


});

/**
 * Validate the string entered in the input to be numbers only
 * @param evt
 */
function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}
