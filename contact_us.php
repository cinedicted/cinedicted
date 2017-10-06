<?php /* Template Name: Contact Us */ ?>
<?php get_header(); ?>
<div class="container">
    <div class="contact-us-container">
        <h1 class="contact-us-header">Contact Us</h1>

        <div>We would LOVE to hear from you. For Editorial requests, Tips or other inquiries pertaining to content on Cinedicted, or general feedback on the site, write to us at <a href="mailto:feedback@cinedicted.com">feedback@cinedicted.com</a>. </div>
        <div>
            For advertising requests, please write us at <a href="mailto:advertising@cinedicted.com">advertising@cinedicted.com</a> with the subject ADVERTISING QUERY.
        </div>
            
        <div>You can also use the Form below to get in touch.</div>
        <div class="contact-us-form col-md-6">
           <?php echo do_shortcode('[contact-form-7 id="38" title="Contact form 1"]'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
