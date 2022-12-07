<footer class="footer">
  <div class="footer-inner">
    <center>
        <h6> &copy; <?php echo date('Y'); ?> by <a href="https://www.facebook.com/thanh.ngotan.503/"> Ngo Tan Thanh </a> & 
        <a href="https://www.facebook.com/tanloi.ho.79"> Ho Tan Loi </a> </h6>
    </center>


    <div class="footer-language-selector"></div>
  </div>
</footer>
<script>
  const stringifyStyle = function(styles){
    return Object.entries(styles).map(function([key, value]){ return `${key}: ${value}` }).join(';');
  }
  const attachStyles = function(element, styles){
    element.setAttribute('style', stringifyStyle(styles));
  }
  const createReducer = function (value) {
    return function(accumulator, currentValue) { return accumulator || currentValue === value; };
  }

  const isIncludes = function(element, array) {
    return array.reduce(createReducer(element), false);
  }
  let __protocol = document.location.protocol;
  let __baseUrl = __protocol + '//livechat.fpt.ai/v35/src';
  const blackListURL = [
  'https://hotro.TABIS.vn/hc/vi/requests/new',
  ];
  let prefixNameLiveChat = 'Tabis';
  let objPreDefineLiveChat = {
  appCode: '8e90ffe36eddd6bf26f3f87058834ef3',
  themes: '',
  appName: prefixNameLiveChat ? prefixNameLiveChat : 'Tabis',
  icon_bot: 'images/logotabi.png',
  logo_button: 'images/logotabi.png'
  },
  appCodeHash = window.location.hash.substr(1);
  if (appCodeHash.length === 32) {
  objPreDefineLiveChat.appCode = appCodeHash;
  }
  const isBlackListLink = isIncludes([window.location.origin, window.location.pathname].join(''), blackListURL);
  if(!isBlackListLink) {
  let fpt_ai_livechat_script = document.createElement('script');
  fpt_ai_livechat_script.id = 'fpt_ai_livechat_script';
  fpt_ai_livechat_script.src = __baseUrl + '/static/fptai-livechat.js';
  document.body.appendChild(fpt_ai_livechat_script);

  let fpt_ai_livechat_stylesheet = document.createElement('link');
  fpt_ai_livechat_stylesheet.id = 'fpt_ai_livechat_script';
  fpt_ai_livechat_stylesheet.rel = 'stylesheet';
  fpt_ai_livechat_stylesheet.href = __baseUrl + '/static/fptai-livechat.css';
  document.body.appendChild(fpt_ai_livechat_stylesheet);

  const fptAiLivechatButtonStyle = {
  background: 'linear-gradient(0deg, #86eae6, #93e1f9 25%, #78dcf5 50%, #4cd4f7 75%, #00c6f9) !important',
  width: '150px !important',
  height: '150px !important',
  bottom: '20px !important',
  'z-index': '1499 !important',
  };
  const fptAiLivechatIconStyle = {
  'margin-top': '-20px',
  width: '125px !important',
  height: '70px !important',
  };
  fpt_ai_livechat_script.onload = function () {
  fpt_ai_render_chatbox(objPreDefineLiveChat, __baseUrl, 'livechat.fpt.ai:443');  
  const fptAiLivechatButtonElement = document.getElementById('fpt_ai_livechat_button');
  const fptAiLivechatIconElement = document.querySelector('#fpt_ai_livechat_button img');
  attachStyles(fptAiLivechatButtonElement, fptAiLivechatButtonStyle);
  attachStyles(fptAiLivechatIconElement, fptAiLivechatIconStyle);
  }
  }
</script>


<!-- / -->


<script src="//static.zdassets.com/hc/assets/vi.e0d205b6bc91cb945936.js"></script>
<script src="https://TABIS.zendesk.com/auth/v2/host.js" data-brand-id="494" data-return-to="https://hotro.TABIS.vn/hc/vi" data-theme="hc" data-locale="vi" data-auth-origin="494,true,true"></script>

<script type="text/javascript">
HelpCenter = {};
HelpCenter.account = {"subdomain":"TABIS","environment":"production","name":"TABIS CS"};
HelpCenter.user = {"identifier":"da39a3ee5e6b4b0d3255bfef95601890afd80709","email":null,"name":null,"role":"anonymous","avatar_url":"https://assets.zendesk.com/hc/assets/default_avatar.png","is_admin":false,"organizations":[],"groups":[]};
HelpCenter.internal = {"asset_url":"//static.zdassets.com/hc/assets/","web_widget_asset_composer_url":"https://static.zdassets.com/ekr/snippet.js","current_session":{"locale":"vi","csrf_token":"hc:hcobject:server:LanPwKzfBIZ2Nt-eFbzF9bY_I_Xjh9Q6DFUVRR55Ij3H2Om7Xq8T7bpp5x8Jp5Jt7MUsYDmvPzlS5iPp8v5HGw","shared_csrf_token":null},"settings":{},"usage_tracking":{"event":"front_page_viewed","data":"BAh7BjoKX21ldGF7CzoPYWNjb3VudF9pZGkDF8gHOhNoZWxwX2NlbnRlcl9pZGkEBm/sCzoNYnJhbmRfaWRpAu4BOgx1c2VyX2lkMDoTdXNlcl9yb2xlX25hbWVJIg5BTk9OWU1PVVMGOgZFVDoLbG9jYWxlSSIHdmkGOwtU--45af56603f132346675575392ef0b5b6569d0112","url":"https://hotro.TABIS.vn/hc/activity"},"current_record_id":null,"current_record_url":null,"current_record_title":null,"search_results_count":null,"current_text_direction":"ltr","current_brand":{"account_id":509975,"brand_id":494,"brand_url":"https://hotro.TABIS.vn","url":"https://TABIS.zendesk.com/api/v2/brands/494.json","name":"TABIS CS","logo":"","subdomain":"TABIS","host_mapping":"hotro.TABIS.vn","help_center_state":"enabled","ticket_form_ids":null,"active":true,"default":true,"has_help_center":true,"created_at":"2014-04-04T10:05:56Z","updated_at":"2021-04-22T07:26:48Z","id":494,"route_id":200},"current_brand_url":"https://TABIS.zendesk.com","current_host_mapping":"hotro.TABIS.vn","current_path":null,"authentication_domain":"https://TABIS.zendesk.com","show_autocomplete_breadcrumbs":true,"rollbar_config":{"enabled":true,"endpoint":"https://rollbar-us.zendesk.com/api/1/item/","accessToken":"731a5a953e9a4b7ab6cac9623f50c732","captureUncaught":true,"captureUnhandledRejections":true,"payload":{"environment":"production","client":{"javascript":{"source_map_enabled":true,"code_version":"1e5401cead0f0c212df5cbcbefbb2a5ba9b6507a","guess_uncaught_frames":true}}}},"user_info_changing_enabled":false,"has_user_profiles_enabled":false,"has_end_user_attachments":true,"user_aliases_enabled":false,"has_anonymous_kb_voting":true,"has_multi_language_help_center":true,"mobile_device":false,"mobile_site_enabled":false,"show_at_mentions":false,"embeddables_config":{"embeddables_web_widget":false,"embeddables_connect_ipms":false},"base_domain":"zendesk.com","answer_bot_subdomain":"static","manage_content_url":"https://hotro.TABIS.vn/hc/vi","arrange_content_url":"https://hotro.TABIS.vn/hc/admin/arrange_contents?locale=vi","general_settings_url":"https://hotro.TABIS.vn/hc/admin/general_settings?locale=vi","user_segments_url":"https://TABIS.zendesk.com/knowledge/user_segments?brand_id=494","has_gather":true,"has_community_enabled":false,"has_community_badges":false,"has_user_segments":true,"has_answer_bot_web_form_enabled":false,"has_answer_bot_web_form_modal_v2":false,"billing_url":"/access/return_to?return_to=https://TABIS.zendesk.com/admin/billing/subscription","is_account_owner":false,"theming_cookie_key":"hc-da39a3ee5e6b4b0d3255bfef95601890afd807091-preview","is_preview":false,"has_guide_user_segments_search":true,"has_alternate_templates":true,"arrange_articles_url":"https://TABIS.zendesk.com/knowledge/arrange?brand_id=494","article_verification_url":"https://TABIS.zendesk.com/knowledge/verification?brand_id=494","has_article_verification":true,"guide_language_settings_url":"https://hotro.TABIS.vn/hc/admin/language_settings?locale=vi","docs_importer_url":"https://TABIS.zendesk.com/knowledge/import_articles?brand_id=494","community_badges_url":"https://TABIS.zendesk.com/knowledge/community_badges?brand_id=494","community_settings_url":"https://TABIS.zendesk.com/knowledge/community_settings?brand_id=494","gather_plan_state":"subscribed","search_settings_url":"https://TABIS.zendesk.com/knowledge/search_settings?brand_id=494","has_multibrand_search_in_plan":true,"theming_api_version":1,"has_pci_credit_card_custom_field":true,"current_brand_id":494,"help_center_restricted":false,"current_brand_active":true,"is_assuming_someone_else":false,"flash_messages":[],"user_photo_editing_enabled":true,"has_end_user_apps":false,"has_docs_importer":true};
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/c02b33a3c8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="resourses/js/scripts.js"></script>
<script src="//static.zdassets.com/hc/assets/moment-f6f8513da6ab17eadada59a1a4edb536.js"></script>
<script src="//static.zdassets.com/hc/assets/hc_enduser-b7c61ee06dc04de48be69aa366875b2f.js"></script>

<script type="text/javascript">(function(){window['__CF$cv$params']={r:'653393813a96561a',m:'5ddf9c9d12e413b3e905545b45af5e6b4ddac51a-1621660626-1800-AdNWiWEzrhBm6N9fZ0r8yCHowG7rU+esj0kAlUxFhhYg8BvLMKnw4hvhZaVX6ogeAg+ySCAcN82LDCYElMspFWxFPNCqe1my2ol3pl71BHp+5Y9EvPXKaWXpTmLrr1Jg9w==',s:[0x6fc5646dd0,0x468e89eea2],}})();</script></body>
</html>
