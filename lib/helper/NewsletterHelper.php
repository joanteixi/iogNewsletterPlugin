<?php

function link_to_news($newsletter)
{
    return link_to('Llegir més >>', 'iog_newsletter_content_show',$newsletter, array('absolute' => true, 'style' => 'color: #007700'));
}

