<?php
/**
 * Copyright (c) 2016-present, Agoo.com.co <http://www.agoo.com.co>.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree or translated in the assets folder.
 */
class HTML
{
    function CreateTemplate($templateName, $data)
    {
        $location = "";
        switch ($templateName)
        {
            case "bienvenida":
                $name   = $data["name"];
                $email  = $data["email"];
                $pass   = $data["password"];
                $location = $this->CreateWelcomeHTML($name, $email, $pass);
                break;
            case "compra":
                $name   = $data["name"];
                $email  = $data["email"];
                $location = $this->CreateCompraHTML($name, $email);
                break;
            case "free":
                $name   = $data["name"];
                $email  = $data["email"];
                $pass   = $data["password"];
                $location = $this->CreateFreeHTML($name, $email, $pass);
                break;
            case "recuperar":
                $email  = $data["email"];
                $url    = $data["url"];
                $location = $this->CreateRecuperarHTML($email, $url);
                break;
        }
        return $location;
    }

    private function CreateWelcomeHTML($name, $email, $pass)
    {
        $now = date("Y-m-d H:i:s");
        $date = strtotime($now);
        $random = rand();
        $username = strstr($email, '@', true);
        $filename = $date . $random . $username . ".html";
        $route = HISTORY_PATH.$filename;
        $fileHandle = fopen($route, 'w') or die("Unable to open file!");
        $written = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
    <!-- NAME: POP-UP -->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Bienvenido a AGOO.COM.CO</title>

    <style type=\"text/css\">
        body,#bodyTable,#bodyCell{
            height:100% !important;
            margin:0;
            padding:0;
            width:100% !important;
        }
        table{
            border-collapse:collapse;
        }
        img,a img{
            border:0;
            outline:none;
            text-decoration:none;
        }
        h1,h2,h3,h4,h5,h6{
            margin:0;
            padding:0;
        }
        p{
            margin:1em 0;
            padding:0;
        }
        a{
            word-wrap:break-word;
        }
        .ReadMsgBody{
            width:100%;
        }
        .ExternalClass{
            width:100%;
        }
        .ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{
            line-height:100%;
        }
        table,td{
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }
        #outlook a{
            padding:0;
        }
        img{
            -ms-interpolation-mode:bicubic;
        }
        body,table,td,p,a,li,blockquote{
            -ms-text-size-adjust:100%;
            -webkit-text-size-adjust:100%;
        }
        #bodyCell{
            padding:0;
        }
        .mcnImage{
            vertical-align:bottom;
        }
        .mcnTextContent img{
            height:auto !important;
        }
        a.mcnButton{
            display:block;
        }
        /*
        @tab Page
        @section background style
        @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        body,#bodyTable{
            /*@editable*/background-color:#F5F5F5;
        }
        /*
        @tab Page
        @section background style
        @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        #bodyCell{
            /*@editable*/border-top:0;
        }
        /*
        @tab Page
        @section heading 1
        @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
        @style heading 1
        */
        h1{
            /*@editable*/color:#202020 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:34px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:center;
        }
        /*
        @tab Page
        @section heading 2
        @tip Set the styling for all second-level headings in your emails.
        @style heading 2
        */
        h2{
            /*@editable*/color:#FFFFFF !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:26px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
        @section heading 3
        @tip Set the styling for all third-level headings in your emails.
        @style heading 3
        */
        h3{
            /*@editable*/color:#404040 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
        @section heading 4
        @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
        @style heading 4
        */
        h4{
            /*@editable*/color:#606060 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:16px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
        @section preheader style
        @tip Set the background color and borders for your email's preheader area.
        */
        #templatePreheader{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Preheader
        @section preheader container
        @tip Set the background color and borders for your email's preheader text container.
        */
        #preheaderBackground{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Preheader
        @section preheader text
        @tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
        */
        .preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{
            /*@editable*/color:#FFFFFF;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:10px;
            /*@editable*/line-height:125%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
        @section preheader link
        @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        .preheaderContainer .mcnTextContent a{
            /*@editable*/color:#FFFFFF;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Header
        @section header style
        @tip Set the background color and borders for your email's header area.
        */
        #templateHeader{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Header
        @section header container
        @tip Set the background color and borders for your email's header text container.
        */
        #headerBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Header
        @section header text
        @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
        */
        .headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
            /*@editable*/color:#202020;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:16px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Header
        @section header link
        @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        .headerContainer .mcnTextContent a{
            /*@editable*/color:#0bb697;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Body
        @section body style
        @tip Set the background color and borders for your email's body area.
        */
        #templateBody{
            /*@editable*/background-color:#F5F5F5;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Body
        @section body container
        @tip Set the background color and borders for your email's body text container.
        */
        #bodyBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Body
        @section body text
        @tip Set the styling for your email's body text. Choose a size and color that is easy to read.
        */
        .bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
            /*@editable*/color:#000;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Body
        @section body link
        @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
        */
        .bodyContainer .mcnTextContent a{
            /*@editable*/color:#0bb697;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Footer
        @section footer style
        @tip Set the background color and borders for your email's footer area.
        */
        #templateFooter{
            /*@editable*/background-color:#F5F5F5;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Footer
        @section footer container
        @tip Set the background color and borders for your email's footer text container.
        */
        #footerBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Footer
        @section footer text
        @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
        */
        .footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
            /*@editable*/color:#606060;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:10px;
            /*@editable*/line-height:125%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Footer
        @section footer link
        @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
        */
        .footerContainer .mcnTextContent a{
            /*@editable*/color:#606060;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        @media only screen and (max-width: 480px){
            body,table,td,p,a,li,blockquote{
                -webkit-text-size-adjust:none !important;
            }

        }	@media only screen and (max-width: 480px){
            body{
                width:100% !important;
                min-width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnBoxedTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcpreview-image-uploader]{
                width:100% !important;
                display:none !important;
            }

        }	@media only screen and (max-width: 480px){
            img[class=mcnImage]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnImageGroupContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageGroupContent]{
                padding:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageGroupBlockInner]{
                padding-bottom:0 !important;
                padding-top:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            tbody[class=mcnImageGroupBlockOuter]{
                padding-bottom:9px !important;
                padding-top:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionTopContent],table[class=mcnCaptionBottomContent]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionLeftTextContentContainer],table[class=mcnCaptionRightTextContentContainer],table[class=mcnCaptionLeftImageContentContainer],table[class=mcnCaptionRightImageContentContainer],table[class=mcnImageCardLeftTextContentContainer],table[class=mcnImageCardRightTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
                padding-right:18px !important;
                padding-left:18px !important;
                padding-bottom:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardBottomImageContent]{
                padding-bottom:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardTopImageContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
                padding-right:18px !important;
                padding-left:18px !important;
                padding-bottom:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardBottomImageContent]{
                padding-bottom:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardTopImageContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionLeftContentOuter] td[class=mcnTextContent],table[class=mcnCaptionRightContentOuter] td[class=mcnTextContent]{
                padding-top:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnCaptionBlockInner] table[class=mcnCaptionTopContent]:last-child td[class=mcnTextContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnBoxedTextContentColumn]{
                padding-left:18px !important;
                padding-right:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnTextContent]{
                padding-right:18px !important;
                padding-left:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            img[class=flexibleImage]{
                height:auto !important;
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section template width
            @tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.
            */
            table[class=templateContainer]{
                /*@tab Mobile Styles
    @section template width
    @tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.*/max-width:600px !important;
                /*@editable*/width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 1
            @tip Make the first-level headings larger in size for better readability on small screens.
            */
            h1{
                /*@editable*/font-size:24px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 2
            @tip Make the second-level headings larger in size for better readability on small screens.
            */
            h2{
                /*@editable*/font-size:20px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 3
            @tip Make the third-level headings larger in size for better readability on small screens.
            */
            h3{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 4
            @tip Make the fourth-level headings larger in size for better readability on small screens.
            */
            h4{
                /*@editable*/font-size:16px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Boxed Text
            @tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
            */
            table[class=mcnBoxedTextContentContainer] td[class=mcnTextContent],td[class=mcnBoxedTextContentContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Preheader Visibility
            @tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
            */
            table[id=templatePreheader]{
                /*@editable*/display:block !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Preheader Text
            @tip Make the preheader text larger in size for better readability on small screens.
            */
            td[class=preheaderContainer] td[class=mcnTextContent],td[class=preheaderContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:14px !important;
                /*@editable*/line-height:115% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Header Text
            @tip Make the header text larger in size for better readability on small screens.
            */
            td[class=headerContainer] td[class=mcnTextContent],td[class=headerContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Body Text
            @tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
            */
            td[class=bodyContainer] td[class=mcnTextContent],td[class=bodyContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section footer text
            @tip Make the body content text larger in size for better readability on small screens.
            */
            td[class=footerContainer] td[class=mcnTextContent],td[class=footerContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:14px !important;
                /*@editable*/line-height:115% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=footerContainer] a[class=utilityLink]{
                display:block !important;
            }

        }
    </style>
</head>
<body leftmargin=\"0\" marginwidth=\"0\" topmargin=\"0\" marginheight=\"0\" offset=\"0\">
                <center>
                    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" id=\"bodyTable\">
                        <tr>
                            <td align=\"center\" valign=\"top\" id=\"bodyCell\" style=\"padding-bottom:40px;\">
                                <!-- BEGIN TEMPLATE // -->
                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                                    <tr>
                                        <td align=\"center\" valign=\"top\">
                                            <!-- BEGIN PREHEADER // -->
                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templatePreheader\">
                                                <tr>
                                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                                            <tr>
                                                                <td align=\"center\" valign=\"top\">
                                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"preheaderBackground\">
                                                                        <tr>
                                                                            <td valign=\"top\" class=\"preheaderContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                                <tr>
                                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">
                                                                                <tbody class=\"mcnDividerBlockOuter\">
                                                                                <tr>
                                                                                    <td class=\"mcnDividerBlockInner\" style=\"padding: 18px;\">
                                                                                        <table class=\"mcnDividerContent\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top-width: 0px;\">
                                                                                            <tbody><tr>
                                                                                                <td>
                                                                                                    <span></span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tbody></table>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END PREHEADER -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align=\"center\" valign=\"top\">
                                            <!-- BEGIN HEADER // -->
                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateHeader\">
                                                <tr>
                                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                                            <tr>
                                                                <td align=\"center\" valign=\"top\">
                                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"headerBackground\">
                                                                        <tr>
                                                                            <td valign=\"top\" class=\"headerContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">
                
                                                                            </table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnImageBlock\">
                                                                                <tbody class=\"mcnImageBlockOuter\">
                                                                                <tr>
                                                                                    <td valign=\"top\" style=\"padding:9px\" class=\"mcnImageBlockInner\">
                                                                                        <table align=\"left\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"mcnImageContentContainer\">
                                                                                            <tbody><tr>
                                                                                                <td class=\"mcnImageContent\" valign=\"top\" style=\"padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 5px;\">
                                                                                                    <img align=\"left\" alt=\"\" src=\"http://www.agoo.com.co/mailing/img/logo-agoo.jpg\" width=\"580px\" style=\"max-width:580px; padding-bottom: 0; display: inline !important; vertical-align: bottom;\" class=\"mcnImage\">
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tbody></table>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END HEADER -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align=\"center\" valign=\"top\">
                                            <!-- BEGIN BODY // -->
                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateBody\">
                                                <tr>
                                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                                            <tr>
                                                                <td align=\"center\" valign=\"top\">
                                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"bodyBackground\">
                                                                        <tr>
                                                                            <td valign=\"top\" class=\"bodyContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                                    <tbody class=\"mcnTextBlockOuter\">
                                                                                    <tr>
                                                                                        <td valign=\"top\" class=\"mcnTextBlockInner\">
                
                                                                                            <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                                <tbody><tr>
                
                                                                                                    <td valign=\"top\" class=\"mcnTextContent\" style=\"padding-top:9px; padding-right: 5px; padding-bottom: 9px; padding-left: 5px;\">
                                                                                                        <h1>Bienvenido a <em>AGOO.COM.CO</em>.</h1>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody></table>
                                                                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                                                <tr>
                                                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">
                                                                                                        <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                                            <tbody>
                                                                                                            <tr>
                                                                                                                <td valign=\"top\" class=\"mcnTextContent\" style=\"font-size: 10px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">
                                                                                                                    ESTE E-MAIL TIENE INFORMACION IMPORTANTE ACERCA DE TU CUENTA Y COMO ADMINISTRAR TU PERFIL. FAVOR LEERLO CUIDADOSAMENTE Y GUARDARLO DE MANERA TAL QUE LO PUEDAS CONSULTAR NUEVAMENTE.
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                                    <tbody class=\"mcnTextBlockOuter\">
                                                                                    <tr>
                                                                                        <td valign=\"top\" class=\"mcnTextBlockInner\">
                
                                                                                            <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td valign=\"top\" class=\"mcnTextContent\" style=\"font-size: 16px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">
                                                                                                        Apreciado(a) Cliente:<b> ". $name . " </b><br/>
                                                                                                        Usuario:<b> ". $email . " </b><br/>
                                                                                                        Contraseña:<b> ". $pass . " </b><br/>
                                                                                                        Es un verdadero honor que hayas escogido a AGOO. Agradecemos que cuentes con nuestro servicio.<br/><br/>
                                                                                                        Tu perfil en <a href=\"http://www.agoo.com.co\" target=\"_blank\">WWW.AGOO.COM.CO</a> ha sido activado con éxito, la lista de programas disponibles se encuentra <a href=\"http://agoo.com.co/programas\" target=\"_blank\">aquí</a>. Esperamos que puedas iniciar el proceso de estimulación intelectual enfocada.<br/>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td style=\"font-size: 12px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\" valign=\"top\" class=\"\">
                                                                                            <br/>
                                                                                            <br/>
                                                                                            Has recibido este mensaje por ser cliente de Strategy English S.A.S. Si has recibido éste e-mail por error o no desea recibir más información de este tipo por favor haga clic aquí o envíe un correo electrónico a info@agoo.com.co con su dirección de correo en el asunto. De lo contrario entendemos que está interesado en recibir este tipo de información.
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END BODY -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align=\"center\" valign=\"top\">
                                            <!-- BEGIN FOOTER // -->
                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateFooter\">
                                                <tr>
                                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                                            <tr>
                                                                <td align=\"center\" valign=\"top\">
                                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"footerBackground\">
                                                                        <tr>
                                                                            <td valign=\"top\" class=\"footerContainer\">
                                                                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">
                                                                                    <tbody class=\"mcnDividerBlockOuter\">
                                                                                    <tr>
                                                                                        <td class=\"mcnDividerBlockInner\" style=\"padding: 36px 18px 18px;\">
                                                                                            <table class=\"mcnDividerContent\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top-width: 1px;border-top-style: dotted;border-top-color: #808080;\">
                                                                                                <tbody><tr>
                                                                                                    <td>
                                                                                                        <span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody></table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                                <tr>
                                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">
                
                                                                                        <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                            <tbody><tr>
                
                                                                                                <td valign=\"top\" class=\"mcnTextContent\" style=\"padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">
                
                                                                                                    <em>Copyright © 2014 Strategy English SAS, Todos los derechos reservados.</em>
                                                                                                    <br>
                                                                                                    <a href=\"http://www.strategyenglish.com\">strategyenglish.com</a>, <a href=\"http://www.strategyenglish.com/contacto/\">Contacto</a>,
                                                                                                    <a href=\"http://www.strategyenglish.com/terminos-de-servicio/\">Términos</a>, <a href=\"http://www.strategyenglish.com/politica-de-privacidad/\">Políticas</a>.
                                                                                                    <br>
                                                                                                    <br>
                                                                                                    <strong>Dirección de correo de contacto:</strong>
                                                                                                    <br>
                                                                                                    <a href=\"mailto:info@strategyenglish.com\">info@strategyenglish.com</a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tbody></table>
                
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END FOOTER -->
                                        </td>
                                    </tr>
                                </table>
                                <!-- // END TEMPLATE -->
                            </td>
                        </tr>
                    </table>
                </center>
                </body>
</html>";

        fwrite($fileHandle, $written);
        fclose($fileHandle);
        return $route;
    }
    private function CreateCompraHTML($name, $email)
    {
        $now = date("Y-m-d H:i:s");
        $date = strtotime($now);
        $random = rand();
        $username = strstr($email, '@', true);
        $filename = $date . $random . $username . ".html";
        $route = HISTORY_PATH.$filename;
        $fileHandle = fopen($route, 'w') or die("Unable to open file!");
        $written = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
    <!-- NAME: POP-UP -->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Muchas gracias por comprar con Agoo.com.co</title>

    <style type=\"text/css\">
        body,#bodyTable,#bodyCell{
            height:100% !important;
            margin:0;
            padding:0;
            width:100% !important;
        }
        table{
            border-collapse:collapse;
        }
        img,a img{
            border:0;
            outline:none;
            text-decoration:none;
        }
        h1,h2,h3,h4,h5,h6{
            margin:0;
            padding:0;
        }
        p{
            margin:1em 0;
            padding:0;
        }
        a{
            word-wrap:break-word;
        }
        .ReadMsgBody{
            width:100%;
        }
        .ExternalClass{
            width:100%;
        }
        .ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{
            line-height:100%;
        }
        table,td{
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }
        #outlook a{
            padding:0;
        }
        img{
            -ms-interpolation-mode:bicubic;
        }
        body,table,td,p,a,li,blockquote{
            -ms-text-size-adjust:100%;
            -webkit-text-size-adjust:100%;
        }
        #bodyCell{
            padding:0;
        }
        .mcnImage{
            vertical-align:bottom;
        }
        .mcnTextContent img{
            height:auto !important;
        }
        a.mcnButton{
            display:block;
        }
        /*
        @tab Page
        @section background style
        @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        body,#bodyTable{
            /*@editable*/background-color:#F5F5F5;
        }
        /*
        @tab Page
        @section background style
        @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        #bodyCell{
            /*@editable*/border-top:0;
        }
        /*
        @tab Page
        @section heading 1
        @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
        @style heading 1
        */
        h1{
            /*@editable*/color:#202020 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:34px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:center;
        }
        /*
        @tab Page
        @section heading 2
        @tip Set the styling for all second-level headings in your emails.
        @style heading 2
        */
        h2{
            /*@editable*/color:#FFFFFF !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:26px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
        @section heading 3
        @tip Set the styling for all third-level headings in your emails.
        @style heading 3
        */
        h3{
            /*@editable*/color:#404040 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
        @section heading 4
        @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
        @style heading 4
        */
        h4{
            /*@editable*/color:#606060 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:16px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
        @section preheader style
        @tip Set the background color and borders for your email's preheader area.
        */
        #templatePreheader{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Preheader
        @section preheader container
        @tip Set the background color and borders for your email's preheader text container.
        */
        #preheaderBackground{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Preheader
        @section preheader text
        @tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
        */
        .preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{
            /*@editable*/color:#FFFFFF;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:10px;
            /*@editable*/line-height:125%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
        @section preheader link
        @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        .preheaderContainer .mcnTextContent a{
            /*@editable*/color:#FFFFFF;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Header
        @section header style
        @tip Set the background color and borders for your email's header area.
        */
        #templateHeader{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Header
        @section header container
        @tip Set the background color and borders for your email's header text container.
        */
        #headerBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Header
        @section header text
        @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
        */
        .headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
            /*@editable*/color:#202020;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:16px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Header
        @section header link
        @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        .headerContainer .mcnTextContent a{
            /*@editable*/color:#0bb697;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Body
        @section body style
        @tip Set the background color and borders for your email's body area.
        */
        #templateBody{
            /*@editable*/background-color:#F5F5F5;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Body
        @section body container
        @tip Set the background color and borders for your email's body text container.
        */
        #bodyBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Body
        @section body text
        @tip Set the styling for your email's body text. Choose a size and color that is easy to read.
        */
        .bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
            /*@editable*/color:#000;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Body
        @section body link
        @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
        */
        .bodyContainer .mcnTextContent a{
            /*@editable*/color:#0bb697;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Footer
        @section footer style
        @tip Set the background color and borders for your email's footer area.
        */
        #templateFooter{
            /*@editable*/background-color:#F5F5F5;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Footer
        @section footer container
        @tip Set the background color and borders for your email's footer text container.
        */
        #footerBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Footer
        @section footer text
        @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
        */
        .footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
            /*@editable*/color:#606060;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:10px;
            /*@editable*/line-height:125%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Footer
        @section footer link
        @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
        */
        .footerContainer .mcnTextContent a{
            /*@editable*/color:#606060;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        @media only screen and (max-width: 480px){
            body,table,td,p,a,li,blockquote{
                -webkit-text-size-adjust:none !important;
            }

        }	@media only screen and (max-width: 480px){
            body{
                width:100% !important;
                min-width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnBoxedTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcpreview-image-uploader]{
                width:100% !important;
                display:none !important;
            }

        }	@media only screen and (max-width: 480px){
            img[class=mcnImage]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnImageGroupContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageGroupContent]{
                padding:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageGroupBlockInner]{
                padding-bottom:0 !important;
                padding-top:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            tbody[class=mcnImageGroupBlockOuter]{
                padding-bottom:9px !important;
                padding-top:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionTopContent],table[class=mcnCaptionBottomContent]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionLeftTextContentContainer],table[class=mcnCaptionRightTextContentContainer],table[class=mcnCaptionLeftImageContentContainer],table[class=mcnCaptionRightImageContentContainer],table[class=mcnImageCardLeftTextContentContainer],table[class=mcnImageCardRightTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
                padding-right:18px !important;
                padding-left:18px !important;
                padding-bottom:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardBottomImageContent]{
                padding-bottom:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardTopImageContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
                padding-right:18px !important;
                padding-left:18px !important;
                padding-bottom:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardBottomImageContent]{
                padding-bottom:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardTopImageContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionLeftContentOuter] td[class=mcnTextContent],table[class=mcnCaptionRightContentOuter] td[class=mcnTextContent]{
                padding-top:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnCaptionBlockInner] table[class=mcnCaptionTopContent]:last-child td[class=mcnTextContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnBoxedTextContentColumn]{
                padding-left:18px !important;
                padding-right:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnTextContent]{
                padding-right:18px !important;
                padding-left:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            img[class=flexibleImage]{
                height:auto !important;
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section template width
            @tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.
            */
            table[class=templateContainer]{
                /*@tab Mobile Styles
    @section template width
    @tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.*/max-width:600px !important;
                /*@editable*/width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 1
            @tip Make the first-level headings larger in size for better readability on small screens.
            */
            h1{
                /*@editable*/font-size:24px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 2
            @tip Make the second-level headings larger in size for better readability on small screens.
            */
            h2{
                /*@editable*/font-size:20px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 3
            @tip Make the third-level headings larger in size for better readability on small screens.
            */
            h3{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 4
            @tip Make the fourth-level headings larger in size for better readability on small screens.
            */
            h4{
                /*@editable*/font-size:16px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Boxed Text
            @tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
            */
            table[class=mcnBoxedTextContentContainer] td[class=mcnTextContent],td[class=mcnBoxedTextContentContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Preheader Visibility
            @tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
            */
            table[id=templatePreheader]{
                /*@editable*/display:block !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Preheader Text
            @tip Make the preheader text larger in size for better readability on small screens.
            */
            td[class=preheaderContainer] td[class=mcnTextContent],td[class=preheaderContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:14px !important;
                /*@editable*/line-height:115% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Header Text
            @tip Make the header text larger in size for better readability on small screens.
            */
            td[class=headerContainer] td[class=mcnTextContent],td[class=headerContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Body Text
            @tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
            */
            td[class=bodyContainer] td[class=mcnTextContent],td[class=bodyContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section footer text
            @tip Make the body content text larger in size for better readability on small screens.
            */
            td[class=footerContainer] td[class=mcnTextContent],td[class=footerContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:14px !important;
                /*@editable*/line-height:115% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=footerContainer] a[class=utilityLink]{
                display:block !important;
            }

        }
    </style>
</head>
<body leftmargin=\"0\" marginwidth=\"0\" topmargin=\"0\" marginheight=\"0\" offset=\"0\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" id=\"bodyTable\">
        <tr>
            <td align=\"center\" valign=\"top\" id=\"bodyCell\" style=\"padding-bottom:40px;\">
                <!-- BEGIN TEMPLATE // -->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                    <tr>
                        <td align=\"center\" valign=\"top\">
                            <!-- BEGIN PREHEADER // -->
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templatePreheader\">
                                <tr>
                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                            <tr>
                                                <td align=\"center\" valign=\"top\">
                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"preheaderBackground\">
                                                        <tr>
                                                            <td valign=\"top\" class=\"preheaderContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                <tr>
                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">
                                                                <tbody class=\"mcnDividerBlockOuter\">
                                                                <tr>
                                                                    <td class=\"mcnDividerBlockInner\" style=\"padding: 18px;\">
                                                                        <table class=\"mcnDividerContent\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top-width: 0px;\">
                                                                            <tbody><tr>
                                                                                <td>
                                                                                    <span></span>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END PREHEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align=\"center\" valign=\"top\">
                            <!-- BEGIN HEADER // -->
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateHeader\">
                                <tr>
                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                            <tr>
                                                <td align=\"center\" valign=\"top\">
                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"headerBackground\">
                                                        <tr>
                                                            <td valign=\"top\" class=\"headerContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">

                                                            </table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnImageBlock\">
                                                                <tbody class=\"mcnImageBlockOuter\">
                                                                <tr>
                                                                    <td valign=\"top\" style=\"padding:9px\" class=\"mcnImageBlockInner\">
                                                                        <table align=\"left\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"mcnImageContentContainer\">
                                                                            <tbody><tr>
                                                                                <td class=\"mcnImageContent\" valign=\"top\" style=\"padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 5px;\">
                                                                                    <img align=\"left\" alt=\"\" src=\"http://www.agoo.com.co/mailing/img/logo-agoo.jpg\" width=\"580px\" style=\"max-width:580px; padding-bottom: 0; display: inline !important; vertical-align: bottom;\" class=\"mcnImage\">
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END HEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align=\"center\" valign=\"top\">
                            <!-- BEGIN BODY // -->
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateBody\">
                                <tr>
                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                            <tr>
                                                <td align=\"center\" valign=\"top\">
                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"bodyBackground\">
                                                        <tr>
                                                            <td valign=\"top\" class=\"bodyContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                <tr>
                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">

                                                                        <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                            <tbody><tr>

                                                                                <td valign=\"top\" class=\"mcnTextContent\" style=\"padding-top:9px; padding-right: 5px; padding-bottom: 9px; padding-left: 5px;\">
                                                                                    <h1>Bienvenido.</h1>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                            <tbody class=\"mcnTextBlockOuter\">
                                                                            <tr>
                                                                                <td valign=\"top\" class=\"mcnTextBlockInner\">
                                                                                    <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td valign=\"top\" class=\"mcnTextContent\" style=\"font-size: 10px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">
                                                                                                ESTE E-MAIL TIENE INFORMACION IMPORTANTE ACERCA DE TU CUENTA Y COMO ADMINISTRAR TU PERFIL. FAVOR LEERLO CUIDADOSAMENTE Y GUARDARLO DE MANERA TAL QUE LO PUEDAS CONSULTAR NUEVAMENTE.
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                    <tbody class=\"mcnTextBlockOuter\">
                                                                    <tr>
                                                                        <td valign=\"top\" class=\"mcnTextBlockInner\">

                                                                            <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td valign=\"top\" class=\"mcnTextContent\" style=\"font-size: 16px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">
                                                                                        Apreciado(a) Cliente:<b> ". $name . " </b><br/>
                                                                                        Usuario:<b> ". $email . " </b>
                                                                                        <br/><br/>
                                                                                        <p style=\"font-size: 32px;\">GRACIAS POR TU COMPRA!!!</p><br/>
                                                                                        Es un verdadero honor que hayas escogido a AGOO. Agradecemos que cuentes con nuestro servicio.
                                                                                        Tu perfil en <a href=\"http://www.agoo.com.co\">WWW:AGOO.COM.CO</a> ha sido activado para que puedas disfrutar del primer nivel del programa de idiomas seleccionado completamente GRATIS!!!, e iniciar el proceso de estimulación intelectual enfocada.<br/>
                                                                                        <br/>Tu factura la encontraras como archivo adjunto en éste mismo correo electrónico y en tu perfil en la sección “Facturación”.
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style=\"font-size: 12px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\" valign=\"top\" class=\"\">
                                                                            <br/>
                                                                            <br/>
                                                                            Has recibido este mensaje por ser cliente de Strategy English S.A.S. Si has recibido éste e-mail por error o no desea recibir más información de este tipo por favor haga clic aquí o envíe un correo electrónico a info@agoo.com.co con su dirección de correo en el asunto. De lo contrario entendemos que está interesado en recibir este tipo de información.
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END BODY -->
                        </td>
                    </tr>
                    <tr>
                        <td align=\"center\" valign=\"top\">
                            <!-- BEGIN FOOTER // -->
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateFooter\">
                                <tr>
                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                            <tr>
                                                <td align=\"center\" valign=\"top\">
                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"footerBackground\">
                                                        <tr>
                                                            <td valign=\"top\" class=\"footerContainer\">
                                                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">
                                                                    <tbody class=\"mcnDividerBlockOuter\">
                                                                    <tr>
                                                                        <td class=\"mcnDividerBlockInner\" style=\"padding: 36px 18px 18px;\">
                                                                            <table class=\"mcnDividerContent\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top-width: 1px;border-top-style: dotted;border-top-color: #808080;\">
                                                                                <tbody><tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                <tr>
                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">

                                                                        <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                            <tbody><tr>

                                                                                <td valign=\"top\" class=\"mcnTextContent\" style=\"padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">

                                                                                    <em>Copyright © 2015 Agoo.com.co es un producto registrado de Strategy English SAS, Todos los derechos reservados.</em>
                                                                                    <br>
                                                                                    <a href=\"http://www.agoo.com.co\">Agoo.com.co</a>, <a href=\"http://www.agoo.com.co/contacto/\">Contacto</a>,
                                                                                    <a href=\"http://www.agoo.com.co/terminos-de-servicio/\">Términos</a>, <a href=\"http://www.agoo.com.co/politica-de-privacidad/\">Políticas</a>.
                                                                                    <br>
                                                                                    <br>
                                                                                    <strong>Dirección de correo de contacto:</strong>
                                                                                    <br>
                                                                                    <a href=\"mailto:info@agoo.com.co\">info@agoo.com.co</a>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>

                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END FOOTER -->
                        </td>
                    </tr>
                </table>
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";

        fwrite($fileHandle, $written);
        fclose($fileHandle);
        return $route;
    }
    private function CreateFreeHTML($name, $email, $pass)
    {
        $now = date("Y-m-d H:i:s");
        $date = strtotime($now);
        $random = rand();
        $username = strstr($email, '@', true);


        $filename = $date . $random . $username;

        $route = "";
        return $route;
    }
    private function CreateRecuperarHTML($email,$url)
    {
        $now = date("Y-m-d H:i:s");
        $date = strtotime($now);
        $random = rand();
        $username = strstr($email, '@', true);
        $filename = $date . $random . $username . ".html";
        $route = HISTORY_PATH.$filename;
        $fileHandle = fopen($route, 'w') or die("Unable to open file!");
        $written = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
    <!-- NAME: POP-UP -->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Recuperar AGOO.COM.CO</title>

    <style type=\"text/css\">
        body,#bodyTable,#bodyCell{
            height:100% !important;
            margin:0;
            padding:0;
            width:100% !important;
        }
        table{
            border-collapse:collapse;
        }
        img,a img{
            border:0;
            outline:none;
            text-decoration:none;
        }
        h1,h2,h3,h4,h5,h6{
            margin:0;
            padding:0;
        }
        p{
            margin:1em 0;
            padding:0;
        }
        a{
            word-wrap:break-word;
        }
        .ReadMsgBody{
            width:100%;
        }
        .ExternalClass{
            width:100%;
        }
        .ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{
            line-height:100%;
        }
        table,td{
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }
        #outlook a{
            padding:0;
        }
        img{
            -ms-interpolation-mode:bicubic;
        }
        body,table,td,p,a,li,blockquote{
            -ms-text-size-adjust:100%;
            -webkit-text-size-adjust:100%;
        }
        #bodyCell{
            padding:0;
        }
        .mcnImage{
            vertical-align:bottom;
        }
        .mcnTextContent img{
            height:auto !important;
        }
        a.mcnButton{
            display:block;
        }
        /*
        @tab Page
        @section background style
        @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        body,#bodyTable{
            /*@editable*/background-color:#F5F5F5;
        }
        /*
        @tab Page
        @section background style
        @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        #bodyCell{
            /*@editable*/border-top:0;
        }
        /*
        @tab Page
        @section heading 1
        @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
        @style heading 1
        */
        h1{
            /*@editable*/color:#202020 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:34px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:center;
        }
        /*
        @tab Page
        @section heading 2
        @tip Set the styling for all second-level headings in your emails.
        @style heading 2
        */
        h2{
            /*@editable*/color:#FFFFFF !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:26px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
        @section heading 3
        @tip Set the styling for all third-level headings in your emails.
        @style heading 3
        */
        h3{
            /*@editable*/color:#404040 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
        @section heading 4
        @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
        @style heading 4
        */
        h4{
            /*@editable*/color:#606060 !important;
            display:block;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:16px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            margin:0;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
        @section preheader style
        @tip Set the background color and borders for your email's preheader area.
        */
        #templatePreheader{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Preheader
        @section preheader container
        @tip Set the background color and borders for your email's preheader text container.
        */
        #preheaderBackground{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Preheader
        @section preheader text
        @tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
        */
        .preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{
            /*@editable*/color:#FFFFFF;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:10px;
            /*@editable*/line-height:125%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
        @section preheader link
        @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        .preheaderContainer .mcnTextContent a{
            /*@editable*/color:#FFFFFF;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Header
        @section header style
        @tip Set the background color and borders for your email's header area.
        */
        #templateHeader{
            /*@editable*/background-color:#0bb697;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Header
        @section header container
        @tip Set the background color and borders for your email's header text container.
        */
        #headerBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Header
        @section header text
        @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
        */
        .headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
            /*@editable*/color:#202020;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:16px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Header
        @section header link
        @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        .headerContainer .mcnTextContent a{
            /*@editable*/color:#0bb697;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Body
        @section body style
        @tip Set the background color and borders for your email's body area.
        */
        #templateBody{
            /*@editable*/background-color:#F5F5F5;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Body
        @section body container
        @tip Set the background color and borders for your email's body text container.
        */
        #bodyBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Body
        @section body text
        @tip Set the styling for your email's body text. Choose a size and color that is easy to read.
        */
        .bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
            /*@editable*/color:#000;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Body
        @section body link
        @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
        */
        .bodyContainer .mcnTextContent a{
            /*@editable*/color:#0bb697;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Footer
        @section footer style
        @tip Set the background color and borders for your email's footer area.
        */
        #templateFooter{
            /*@editable*/background-color:#F5F5F5;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Footer
        @section footer container
        @tip Set the background color and borders for your email's footer text container.
        */
        #footerBackground{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Footer
        @section footer text
        @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
        */
        .footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
            /*@editable*/color:#606060;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:10px;
            /*@editable*/line-height:125%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Footer
        @section footer link
        @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
        */
        .footerContainer .mcnTextContent a{
            /*@editable*/color:#606060;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        @media only screen and (max-width: 480px){
            body,table,td,p,a,li,blockquote{
                -webkit-text-size-adjust:none !important;
            }

        }	@media only screen and (max-width: 480px){
            body{
                width:100% !important;
                min-width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnBoxedTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcpreview-image-uploader]{
                width:100% !important;
                display:none !important;
            }

        }	@media only screen and (max-width: 480px){
            img[class=mcnImage]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnImageGroupContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageGroupContent]{
                padding:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageGroupBlockInner]{
                padding-bottom:0 !important;
                padding-top:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            tbody[class=mcnImageGroupBlockOuter]{
                padding-bottom:9px !important;
                padding-top:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionTopContent],table[class=mcnCaptionBottomContent]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionLeftTextContentContainer],table[class=mcnCaptionRightTextContentContainer],table[class=mcnCaptionLeftImageContentContainer],table[class=mcnCaptionRightImageContentContainer],table[class=mcnImageCardLeftTextContentContainer],table[class=mcnImageCardRightTextContentContainer]{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
                padding-right:18px !important;
                padding-left:18px !important;
                padding-bottom:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardBottomImageContent]{
                padding-bottom:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardTopImageContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
                padding-right:18px !important;
                padding-left:18px !important;
                padding-bottom:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardBottomImageContent]{
                padding-bottom:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnImageCardTopImageContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            table[class=mcnCaptionLeftContentOuter] td[class=mcnTextContent],table[class=mcnCaptionRightContentOuter] td[class=mcnTextContent]{
                padding-top:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnCaptionBlockInner] table[class=mcnCaptionTopContent]:last-child td[class=mcnTextContent]{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnBoxedTextContentColumn]{
                padding-left:18px !important;
                padding-right:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=mcnTextContent]{
                padding-right:18px !important;
                padding-left:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            img[class=flexibleImage]{
                height:auto !important;
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section template width
            @tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.
            */
            table[class=templateContainer]{
                /*@tab Mobile Styles
    @section template width
    @tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.*/max-width:600px !important;
                /*@editable*/width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 1
            @tip Make the first-level headings larger in size for better readability on small screens.
            */
            h1{
                /*@editable*/font-size:24px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 2
            @tip Make the second-level headings larger in size for better readability on small screens.
            */
            h2{
                /*@editable*/font-size:20px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 3
            @tip Make the third-level headings larger in size for better readability on small screens.
            */
            h3{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section heading 4
            @tip Make the fourth-level headings larger in size for better readability on small screens.
            */
            h4{
                /*@editable*/font-size:16px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Boxed Text
            @tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
            */
            table[class=mcnBoxedTextContentContainer] td[class=mcnTextContent],td[class=mcnBoxedTextContentContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Preheader Visibility
            @tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
            */
            table[id=templatePreheader]{
                /*@editable*/display:block !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Preheader Text
            @tip Make the preheader text larger in size for better readability on small screens.
            */
            td[class=preheaderContainer] td[class=mcnTextContent],td[class=preheaderContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:14px !important;
                /*@editable*/line-height:115% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Header Text
            @tip Make the header text larger in size for better readability on small screens.
            */
            td[class=headerContainer] td[class=mcnTextContent],td[class=headerContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section Body Text
            @tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
            */
            td[class=bodyContainer] td[class=mcnTextContent],td[class=bodyContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
            @section footer text
            @tip Make the body content text larger in size for better readability on small screens.
            */
            td[class=footerContainer] td[class=mcnTextContent],td[class=footerContainer] td[class=mcnTextContent] p{
                /*@editable*/font-size:14px !important;
                /*@editable*/line-height:115% !important;
            }

        }	@media only screen and (max-width: 480px){
            td[class=footerContainer] a[class=utilityLink]{
                display:block !important;
            }

        }
    </style>
</head>
<body leftmargin=\"0\" marginwidth=\"0\" topmargin=\"0\" marginheight=\"0\" offset=\"0\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" id=\"bodyTable\">
        <tr>
            <td align=\"center\" valign=\"top\" id=\"bodyCell\" style=\"padding-bottom:40px;\">
                <!-- BEGIN TEMPLATE // -->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
                    <tr>
                        <td align=\"center\" valign=\"top\">
                            <!-- BEGIN PREHEADER // -->
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templatePreheader\">
                                <tr>
                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                            <tr>
                                                <td align=\"center\" valign=\"top\">
                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"preheaderBackground\">
                                                        <tr>
                                                            <td valign=\"top\" class=\"preheaderContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                <tr>
                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">
                                                                <tbody class=\"mcnDividerBlockOuter\">
                                                                <tr>
                                                                    <td class=\"mcnDividerBlockInner\" style=\"padding: 18px;\">
                                                                        <table class=\"mcnDividerContent\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top-width: 0px;\">
                                                                            <tbody><tr>
                                                                                <td>
                                                                                    <span></span>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END PREHEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align=\"center\" valign=\"top\">
                            <!-- BEGIN HEADER // -->
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateHeader\">
                                <tr>
                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                            <tr>
                                                <td align=\"center\" valign=\"top\">
                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"headerBackground\">
                                                        <tr>
                                                            <td valign=\"top\" class=\"headerContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">

                                                            </table> <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnImageBlock\">
                                                                <tbody class=\"mcnImageBlockOuter\">
                                                                <tr>
                                                                    <td valign=\"top\" style=\"padding:9px\" class=\"mcnImageBlockInner\">
                                                                        <table align=\"left\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"mcnImageContentContainer\">
                                                                            <tbody><tr>
                                                                                <td class=\"mcnImageContent\" valign=\"top\" style=\"padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 5px;\">
                                                                                    <img align=\"left\" alt=\"\" src=\"http://www.agoo.com.co/mailing/img/logo-agoo.jpg\" width=\"580px\" style=\"max-width:580px; padding-bottom: 0; display: inline !important; vertical-align: bottom;\" class=\"mcnImage\">
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END HEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align=\"center\" valign=\"top\">
                            <!-- BEGIN BODY // -->
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateBody\">
                                <tr>
                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                            <tr>
                                                <td align=\"center\" valign=\"top\">
                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"bodyBackground\">
                                                        <tr>
                                                            <td valign=\"top\" class=\"bodyContainer\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                <tr>
                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">

                                                                        <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                            <tbody><tr>

                                                                                <td valign=\"top\" class=\"mcnTextContent\" style=\"padding-top:9px; padding-right: 5px; padding-bottom: 9px; padding-left: 5px;\">
                                                                                    <h1>Bienvenido.</h1>
                                                                                    <!--<h1>Bienvenido a <em>STRATEGY ENGLISH</em>.<br>We already live in the future.<br> Shouldn't your business?</h1>-->
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                            <tbody class=\"mcnTextBlockOuter\">
                                                                            <tr>
                                                                                <td valign=\"top\" class=\"mcnTextBlockInner\">
                                                                                    <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td valign=\"top\" class=\"mcnTextContent\" style=\"font-size: 10px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">
                                                                                                ESTE E-MAIL TIENE INFORMACION IMPORTANTE ACERCA DE TU CUENTA DE PERFIL.
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                    <tbody class=\"mcnTextBlockOuter\">
                                                                    <tr>
                                                                        <td valign=\"top\" class=\"mcnTextBlockInner\">

                                                                            <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td valign=\"top\" class=\"mcnTextContent\" style=\"font-size: 16px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">
                                                                                        Apreciado(a) Cliente:<b> " . $email .  "</b><br/>
                                                                                        <br/>
                                                                                        Por favor ingrese a este enlace* para recuperar su contraseña:<br/><br/><a href=\" ". $url . " \" target=\"_blank\">Recuperar Ahora.</a>
                                                                                        <br/><br/>
                                                                                        <p style=\"font-size: 10px;\">*Con este enlace se podrá recuperar contraseña una unica vez.<p>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style=\"font-size: 12px; text-align: justify; padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\" valign=\"top\" class=\"\">
                                                                            <br/>
                                                                            <br/>
                                                                            Has recibido este mensaje por ser cliente de Strategy English S.A.S. Si has recibido éste e-mail por error o no desea recibir más información de este tipo por favor haga clic aquí o envíe un correo electrónico a info@agoo.com.co con su dirección de correo en el asunto. De lo contrario entendemos que está interesado en recibir este tipo de información.
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END BODY -->
                        </td>
                    </tr>
                    <tr>
                        <td align=\"center\" valign=\"top\">
                            <!-- BEGIN FOOTER // -->
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"templateFooter\">
                                <tr>
                                    <td align=\"center\" valign=\"top\" style=\"padding-right:10px; padding-left:10px;\">
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"templateContainer\">
                                            <tr>
                                                <td align=\"center\" valign=\"top\">
                                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"footerBackground\">
                                                        <tr>
                                                            <td valign=\"top\" class=\"footerContainer\">
                                                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnDividerBlock\">
                                                                    <tbody class=\"mcnDividerBlockOuter\">
                                                                    <tr>
                                                                        <td class=\"mcnDividerBlockInner\" style=\"padding: 36px 18px 18px;\">
                                                                            <table class=\"mcnDividerContent\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top-width: 1px;border-top-style: dotted;border-top-color: #808080;\">
                                                                                <tbody><tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"mcnTextBlock\">
                                                                <tbody class=\"mcnTextBlockOuter\">
                                                                <tr>
                                                                    <td valign=\"top\" class=\"mcnTextBlockInner\">

                                                                        <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"mcnTextContentContainer\">
                                                                            <tbody><tr>

                                                                                <td valign=\"top\" class=\"mcnTextContent\" style=\"padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;\">

                                                                                    <em>Copyright © 2015 Agoo.com.co es un producto registrado de Strategy English SAS, Todos los derechos reservados.</em>
                                                                                    <br>
                                                                                    <a href=\"http://www.agoo.com.co\">Agoo.com.co</a>, <a href=\"http://www.agoo.com.co/contacto/\">Contacto</a>,
                                                                                    <a href=\"http://www.agoo.com.co/terminos-de-servicio/\">Términos</a>, <a href=\"http://www.agoo.com.co/politica-de-privacidad/\">Políticas</a>.
                                                                                    <br>
                                                                                    <br>
                                                                                    <strong>Dirección de correo de contacto:</strong>
                                                                                    <br>
                                                                                    <a href=\"mailto:info@agoo.com.co\">info@agoo.com.co</a>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>

                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END FOOTER -->
                        </td>
                    </tr>
                </table>
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";

        fwrite($fileHandle, $written);
        fclose($fileHandle);
        return $route;
    }
}