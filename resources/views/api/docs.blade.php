<!DOCTYPE html><html><head><meta charset="utf-8"><title>Cloud Api Documentation</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><style>@import url('https://fonts.googleapis.com/css?family=Roboto:400,700|Inconsolata|Raleway:200');.hljs-comment,.hljs-title{color:#8e908c}.hljs-variable,.hljs-attribute,.hljs-tag,.hljs-regexp,.ruby .hljs-constant,.xml .hljs-tag .hljs-title,.xml .hljs-pi,.xml .hljs-doctype,.html .hljs-doctype,.css .hljs-id,.css .hljs-class,.css .hljs-pseudo{color:#c82829}.hljs-number,.hljs-preprocessor,.hljs-pragma,.hljs-built_in,.hljs-literal,.hljs-params,.hljs-constant{color:#f5871f}.ruby .hljs-class .hljs-title,.css .hljs-rules .hljs-attribute{color:#eab700}.hljs-string,.hljs-value,.hljs-inheritance,.hljs-header,.ruby .hljs-symbol,.xml .hljs-cdata{color:#718c00}.css .hljs-hexcolor{color:#3e999f}.hljs-function,.python .hljs-decorator,.python .hljs-title,.ruby .hljs-function .hljs-title,.ruby .hljs-title .hljs-keyword,.perl .hljs-sub,.javascript .hljs-title,.coffeescript .hljs-title{color:#4271ae}.hljs-keyword,.javascript .hljs-function{color:#8959a8}.hljs{display:block;background:white;color:#4d4d4c;padding:.5em}.coffeescript .javascript,.javascript .xml,.tex .hljs-formula,.xml .javascript,.xml .vbscript,.xml .css,.xml .hljs-cdata{opacity:.5}.right .hljs-comment{color:#969896}.right .css .hljs-class,.right .css .hljs-id,.right .css .hljs-pseudo,.right .hljs-attribute,.right .hljs-regexp,.right .hljs-tag,.right .hljs-variable,.right .html .hljs-doctype,.right .ruby .hljs-constant,.right .xml .hljs-doctype,.right .xml .hljs-pi,.right .xml .hljs-tag .hljs-title{color:#c66}.right .hljs-built_in,.right .hljs-constant,.right .hljs-literal,.right .hljs-number,.right .hljs-params,.right .hljs-pragma,.right .hljs-preprocessor{color:#de935f}.right .css .hljs-rule .hljs-attribute,.right .ruby .hljs-class .hljs-title{color:#f0c674}.right .hljs-header,.right .hljs-inheritance,.right .hljs-name,.right .hljs-string,.right .hljs-value,.right .ruby .hljs-symbol,.right .xml .hljs-cdata{color:#b5bd68}.right .css .hljs-hexcolor,.right .hljs-title{color:#8abeb7}.right .coffeescript .hljs-title,.right .hljs-function,.right .javascript .hljs-title,.right .perl .hljs-sub,.right .python .hljs-decorator,.right .python .hljs-title,.right .ruby .hljs-function .hljs-title,.right .ruby .hljs-title .hljs-keyword{color:#81a2be}.right .hljs-keyword,.right .javascript .hljs-function{color:#b294bb}.right .hljs{display:block;overflow-x:auto;background:#1d1f21;color:#c5c8c6;padding:.5em;-webkit-text-size-adjust:none}.right .coffeescript .javascript,.right .javascript .xml,.right .tex .hljs-formula,.right .xml .css,.right .xml .hljs-cdata,.right .xml .javascript,.right .xml .vbscript{opacity:.5}body{color:black;background:white;font:400 14px / 1.42 'Roboto',Helvetica,sans-serif}header{border-bottom:1px solid #f2f2f2;margin-bottom:12px}h1,h2,h3,h4,h5{color:black;margin:12px 0}h1 .permalink,h2 .permalink,h3 .permalink,h4 .permalink,h5 .permalink{margin-left:0;opacity:0;transition:opacity .25s ease}h1:hover .permalink,h2:hover .permalink,h3:hover .permalink,h4:hover .permalink,h5:hover .permalink{opacity:1}.triple h1 .permalink,.triple h2 .permalink,.triple h3 .permalink,.triple h4 .permalink,.triple h5 .permalink{opacity:.15}.triple h1:hover .permalink,.triple h2:hover .permalink,.triple h3:hover .permalink,.triple h4:hover .permalink,.triple h5:hover .permalink{opacity:.15}h1{font:200 36px 'Raleway',Helvetica,sans-serif;font-size:36px}h2{font:200 36px 'Raleway',Helvetica,sans-serif;font-size:30px}h3{font-size:100%;text-transform:uppercase}h5{font-size:100%;font-weight:normal}p{margin:0 0 10px}p.choices{line-height:1.6}a{color:#428bca;text-decoration:none}li p{margin:0}hr.split{border:0;height:1px;width:100%;padding-left:6px;margin:12px auto;background-image:linear-gradient(to right, rgba(0,0,0,0) 20%, rgba(0,0,0,0.2) 51.4%, rgba(255,255,255,0.2) 51.4%, rgba(255,255,255,0) 80%)}dl dt{float:left;width:130px;clear:left;text-align:right;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-weight:700}dl dd{margin-left:150px}blockquote{color:rgba(0,0,0,0.5);font-size:15.5px;padding:10px 20px;margin:12px 0;border-left:5px solid #e8e8e8}blockquote p:last-child{margin-bottom:0}pre{background-color:#f5f5f5;padding:12px;border:1px solid #cfcfcf;border-radius:6px;overflow:auto}pre code{color:black;background-color:transparent;padding:0;border:none}code{color:#444;background-color:#f5f5f5;font:'Inconsolata',monospace;padding:1px 4px;border:1px solid #cfcfcf;border-radius:3px}ul,ol{padding-left:2em}table{border-collapse:collapse;border-spacing:0;margin-bottom:12px}table tr:nth-child(2n){background-color:#fafafa}table th,table td{padding:6px 12px;border:1px solid #e6e6e6}.text-muted{opacity:.5}.note,.warning{padding:.3em 1em;margin:1em 0;border-radius:2px;font-size:90%}.note h1,.warning h1,.note h2,.warning h2,.note h3,.warning h3,.note h4,.warning h4,.note h5,.warning h5,.note h6,.warning h6{font-family:200 36px 'Raleway',Helvetica,sans-serif;font-size:135%;font-weight:500}.note p,.warning p{margin:.5em 0}.note{color:black;background-color:#f0f6fb;border-left:4px solid #428bca}.note h1,.note h2,.note h3,.note h4,.note h5,.note h6{color:#428bca}.warning{color:black;background-color:#fbf1f0;border-left:4px solid #c9302c}.warning h1,.warning h2,.warning h3,.warning h4,.warning h5,.warning h6{color:#c9302c}header{margin-top:24px}nav{position:fixed;top:24px;bottom:0;overflow-y:auto}nav .resource-group{padding:0}nav .resource-group .heading{position:relative}nav .resource-group .heading .chevron{position:absolute;top:12px;right:12px;opacity:.5}nav .resource-group .heading a{display:block;color:black;opacity:.7;border-left:2px solid transparent;margin:0}nav .resource-group .heading a:hover{text-decoration:none;background-color:bad-color;border-left:2px solid black}nav ul{list-style-type:none;padding-left:0}nav ul a{display:block;font-size:13px;color:rgba(0,0,0,0.7);padding:8px 12px;border-top:1px solid #d9d9d9;border-left:2px solid transparent;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}nav ul a:hover{text-decoration:none;background-color:bad-color;border-left:2px solid black}nav ul>li{margin:0}nav ul>li:first-child{margin-top:-12px}nav ul>li:last-child{margin-bottom:-12px}nav ul ul a{padding-left:24px}nav ul ul li{margin:0}nav ul ul li:first-child{margin-top:0}nav ul ul li:last-child{margin-bottom:0}nav>div>div>ul>li:first-child>a{border-top:none}.preload *{transition:none !important}.pull-left{float:left}.pull-right{float:right}.badge{display:inline-block;float:right;min-width:10px;min-height:14px;padding:3px 7px;font-size:12px;color:#000;background-color:#f2f2f2;border-radius:10px;margin:-2px 0}.badge.get{color:#70bbe1;background-color:#d9edf7}.badge.head{color:#70bbe1;background-color:#d9edf7}.badge.options{color:#70bbe1;background-color:#d9edf7}.badge.put{color:#f0db70;background-color:#fcf8e3}.badge.patch{color:#f0db70;background-color:#fcf8e3}.badge.post{color:#93cd7c;background-color:#dff0d8}.badge.delete{color:#ce8383;background-color:#f2dede}.collapse-button{float:right}.collapse-button .close{display:none;color:#428bca;cursor:pointer}.collapse-button .open{color:#428bca;cursor:pointer}.collapse-button.show .close{display:inline}.collapse-button.show .open{display:none}.collapse-content{max-height:0;overflow:hidden;transition:max-height .3s ease-in-out}nav{width:220px}.container{max-width:940px;margin-left:auto;margin-right:auto}.container .row .content{margin-left:244px;width:696px}.container .row:after{content:'';display:block;clear:both}.container-fluid nav{width:22%}.container-fluid .row .content{margin-left:24%}.container-fluid.triple nav{width:16.5%;padding-right:1px}.container-fluid.triple .row .content{position:relative;margin-left:16.5%;padding-left:24px}.middle:before,.middle:after{content:'';display:table}.middle:after{clear:both}.middle{box-sizing:border-box;width:51.5%;padding-right:12px}.right{box-sizing:border-box;float:right;width:48.5%;padding-left:12px}.right a{color:#428bca}.right h1,.right h2,.right h3,.right h4,.right h5,.right p,.right div{color:white}.right pre{background-color:#1d1f21;border:1px solid #1d1f21}.right pre code{color:#c5c8c6}.right .description{margin-top:12px}.triple .resource-heading{font-size:125%}.definition{margin-top:12px;margin-bottom:12px}.definition .method{font-weight:bold}.definition .method.get{color:#2e8ab8}.definition .method.head{color:#2e8ab8}.definition .method.options{color:#2e8ab8}.definition .method.post{color:#56b82e}.definition .method.put{color:#b8a22e}.definition .method.patch{color:#b8a22e}.definition .method.delete{color:#b82e2e}.definition .uri{word-break:break-all;word-wrap:break-word}.definition .hostname{opacity:.5}.example-names{background-color:#eee;padding:12px;border-radius:6px}.example-names .tab-button{cursor:pointer;color:black;border:1px solid #ddd;padding:6px;margin-left:12px}.example-names .tab-button.active{background-color:#d5d5d5}.right .example-names{background-color:#444}.right .example-names .tab-button{color:white;border:1px solid #666;border-radius:6px}.right .example-names .tab-button.active{background-color:#5e5e5e}#nav-background{position:fixed;left:0;top:0;bottom:0;width:16.5%;padding-right:14.4px;background-color:#fbfbfb;border-right:1px solid #f0f0f0;z-index:-1}#right-panel-background{position:absolute;right:-12px;top:-12px;bottom:-12px;width:48.6%;background-color:#333;z-index:-1}@media (max-width:1200px){nav{width:198px}.container{max-width:840px}.container .row .content{margin-left:224px;width:606px}}@media (max-width:992px){nav{width:169.4px}.container{max-width:720px}.container .row .content{margin-left:194px;width:526px}}@media (max-width:768px){nav{display:none}.container{width:95%;max-width:none}.container .row .content,.container-fluid .row .content,.container-fluid.triple .row .content{margin-left:auto;margin-right:auto;width:95%}#nav-background{display:none}#right-panel-background{width:48.6%}}.back-to-top{position:fixed;z-index:1;bottom:0;right:24px;padding:4px 8px;color:rgba(0,0,0,0.5);background-color:#f2f2f2;text-decoration:none !important;border-top:1px solid #d9d9d9;border-left:1px solid #d9d9d9;border-right:1px solid #d9d9d9;border-top-left-radius:3px;border-top-right-radius:3px}.resource-group{padding:12px;margin-bottom:12px;background-color:white;border:1px solid #d9d9d9;border-radius:6px}.resource-group h2.group-heading,.resource-group .heading a{padding:12px;margin:-12px -12px 12px -12px;background-color:#f2f2f2;border-bottom:1px solid #d9d9d9;border-top-left-radius:6px;border-top-right-radius:6px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}.triple .content .resource-group{padding:0;border:none}.triple .content .resource-group h2.group-heading,.triple .content .resource-group .heading a{margin:0 0 12px 0;border:1px solid #d9d9d9}nav .resource-group .heading a{padding:12px;margin-bottom:0}nav .resource-group .collapse-content{padding:0}.action{margin-bottom:12px;padding:12px 12px 0 12px;overflow:hidden;border:1px solid transparent;border-radius:6px}.action h4.action-heading{padding:12px;margin:-12px -12px 12px -12px;border-bottom:1px solid transparent;border-top-left-radius:6px;border-top-right-radius:6px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}.action h4.action-heading .name{float:right;font-weight:normal}.action h4.action-heading .method{padding:6px 12px;margin-right:12px;border-radius:3px}.action h4.action-heading .method.get{color:#fff;background-color:#337ab7}.action h4.action-heading .method.head{color:#fff;background-color:#337ab7}.action h4.action-heading .method.options{color:#fff;background-color:#337ab7}.action h4.action-heading .method.put{color:#fff;background-color:#ed9c28}.action h4.action-heading .method.patch{color:#fff;background-color:#ed9c28}.action h4.action-heading .method.post{color:#fff;background-color:#5cb85c}.action h4.action-heading .method.delete{color:#fff;background-color:#d9534f}.action h4.action-heading code{color:#444;background-color:#f5f5f5;border-color:#cfcfcf;font-weight:normal}.action dl.inner{padding-bottom:2px}.action .title{border-bottom:1px solid white;margin:0 -12px -1px -12px;padding:12px}.action.get{border-color:#bce8f1}.action.get h4.action-heading{color:#337ab7;background:#d9edf7;border-bottom-color:#bce8f1}.action.head{border-color:#bce8f1}.action.head h4.action-heading{color:#337ab7;background:#d9edf7;border-bottom-color:#bce8f1}.action.options{border-color:#bce8f1}.action.options h4.action-heading{color:#337ab7;background:#d9edf7;border-bottom-color:#bce8f1}.action.post{border-color:#d6e9c6}.action.post h4.action-heading{color:#5cb85c;background:#dff0d8;border-bottom-color:#d6e9c6}.action.put{border-color:#faebcc}.action.put h4.action-heading{color:#ed9c28;background:#fcf8e3;border-bottom-color:#faebcc}.action.patch{border-color:#faebcc}.action.patch h4.action-heading{color:#ed9c28;background:#fcf8e3;border-bottom-color:#faebcc}.action.delete{border-color:#ebccd1}.action.delete h4.action-heading{color:#d9534f;background:#f2dede;border-bottom-color:#ebccd1}</style></head><body class="preload"><a href="#top" class="text-muted back-to-top"><i class="fa fa-toggle-up"></i>&nbsp;Back to top</a><div class="container"><div class="row"><nav><div class="resource-group"><div class="heading"><div class="chevron"><i class="open fa fa-angle-down"></i></div><a href="#">Resource Group</a></div><div class="collapse-content"><ul><li><a href="#documentation-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Returns the raw 1a blueprint format of the documentation</a></li><li><a href="#authentification">Authentification</a><ul></ul></li><li><a href="#users">Users</a><ul><li><a href="#users-post"><span class="badge post"><i class="fa fa-plus"></i></span>Create a new user.</a></li><li><a href="#users-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Display the specified resource.</a></li><li><a href="#users-patch"><span class="badge patch"><i class="fa fa-pencil"></i></span>Update the specified resource in storage.</a></li></ul></li><li><a href="#directories">Directories</a><ul><li><a href="#directories-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Gets the list of all the users directories</a></li><li><a href="#directories-post"><span class="badge post"><i class="fa fa-plus"></i></span>Store a new directory</a></li><li><a href="#directories-get-1"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Show a specific directory resource</a></li><li><a href="#directories-get-2"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Lists all directories in a specified path</a></li><li><a href="#directories-patch"><span class="badge patch"><i class="fa fa-pencil"></i></span>Update a directory</a></li></ul></li><li><a href="#calendar">Calendar</a><ul><li><a href="#calendar-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Display all the calendars for a user.</a></li><li><a href="#calendar-post"><span class="badge post"><i class="fa fa-plus"></i></span>Store a newly created calendar in storage.</a></li><li><a href="#calendar-get-1"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Display the specified resource.</a></li><li><a href="#calendar-patch"><span class="badge patch"><i class="fa fa-pencil"></i></span>Update the specified resource in storage.</a></li><li><a href="#calendar-delete"><span class="badge delete"><i class="fa fa-times"></i></span>Remove the specified resource from storage.</a></li></ul></li><li><a href="#calendarevent">CalendarEvent</a><ul><li><a href="#calendarevent-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Display a listing of calendar events.</a></li><li><a href="#calendarevent-post"><span class="badge post"><i class="fa fa-plus"></i></span>Store a newly created calendar event in storage.</a></li><li><a href="#calendarevent-post-1"><span class="badge post"><i class="fa fa-plus"></i></span>Display an event resource.</a></li><li><a href="#calendarevent-patch"><span class="badge patch"><i class="fa fa-pencil"></i></span>Update the specified resource in storage.</a></li><li><a href="#calendarevent-delete"><span class="badge delete"><i class="fa fa-times"></i></span>Remove the specified resource from storage.</a></li></ul></li><li><a href="#contact">Contact</a><ul><li><a href="#contact-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Display a listing of the resource.</a></li><li><a href="#contact-post"><span class="badge post"><i class="fa fa-plus"></i></span>Store a newly created resource in storage.</a></li><li><a href="#contact-get-1"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Display the specified contact resource.</a></li><li><a href="#contact-patch"><span class="badge patch"><i class="fa fa-pencil"></i></span>Update the specified resource in storage.</a></li><li><a href="#contact-delete"><span class="badge delete"><i class="fa fa-times"></i></span>Remove the specified resource from storage.</a></li></ul></li></ul></div></div></nav><div class="content"><header><h1 id="top">Cloud Api Documentation</h1></header><section id="" class="resource-group"><h2 class="group-heading">Resource Group <a href="#" class="permalink">&para;</a></h2><div id="documentation" class="resource"><h3 class="resource-heading">Documentation <a href="#documentation" class="permalink">&nbsp;&para;</a></h3><p>Class DocController</p>
<div id="documentation-get" class="action get"><h4 class="action-heading"><div class="name">Returns the raw 1a blueprint format of the documentation</div><a href="#documentation-get" class="method get">GET</a><code class="uri">/api/docs/raw</code></h4><h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/api/docs/raw</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">text/plain</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>FORMAT: 1A # Cloud Api Documentation  ....</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="authentification" class="resource"><h3 class="resource-heading">Authentification <a href="#authentification" class="permalink">&nbsp;&para;</a></h3><p>Class AuthController</p>
<h2 id="header--1"><a name="auth"></a> <a class="permalink" href="#header--1" aria-hidden="true">¶</a></h2>
<p>Authenticates the user with his email or username, and password. Returns a Json Web Token and it’s validity delays [POST /auth/jwt/get_token]</p>
<ul>
<li>Example</li>
</ul>
<pre><code>curl -<span class="hljs-constant">X POST </span><span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/ricci.cpnv-es.ch/api</span><span class="hljs-regexp">/auth/jwt</span>_get_token \
--data <span class="hljs-string">"{'login':[username or email],'password':[password]}"</span></code></pre>
<ul>
<li>
<p>Request (application/json)</p>
<ul>
<li>
<p>Body</p>
<pre><code>{
      "<span class="hljs-attribute">login</span>": <span class="hljs-value"><span class="hljs-string">"username or email"</span></span>,
      "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"password..."</span>
  </span>}</code></pre>
</li>
</ul>
</li>
<li>
<p>Response 200 (application/json)</p>
<ul>
<li>
<p>Body</p>
<pre><code>{
      "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
      "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">token</span>": <span class="hljs-value"><span class="hljs-string">"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hcGlcL2F1dGhcL2p3dFwvZ2V0X3Rva2VuIiwiaWF0IjoxNDYwNzAyNTk2LCJleHAiOjE0NjA3NjI1OTYsIm5iZiI6MTQ2MDcwMjU5NiwianRpIjoiNTBmMTVkMzE5NzA4ODhjMjE3N2ZiYzVjZjRiNDlhYjgifQ.xdk3663b3YYFPaesOlPwDK6rf6ajhO5Kx0NQ3sa7jjI"</span></span>,
          "<span class="hljs-attribute">ttl</span>": <span class="hljs-value"><span class="hljs-number">1000</span></span>,
          "<span class="hljs-attribute">refresh_ttl</span>": <span class="hljs-value"><span class="hljs-number">20160</span></span>,
          "<span class="hljs-attribute">user_id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
      </span>}
  </span>}</code></pre>
</li>
</ul>
</li>
</ul>
<h2 id="header--2"><a name="refresh_auth"></a> <a class="permalink" href="#header--2" aria-hidden="true">¶</a></h2>
<p>Refreshes a token from either the headers, or a query parameter [POST /auth/jwt/refresh_token]</p>
<ul>
<li>Example</li>
</ul>
<pre><code>curl -X <span class="hljs-keyword">POST</span> http:<span class="hljs-comment">//ricci.cpnv-es.ch/api/auth/jwt_get_token \</span>
--header "Authorization: bearer &lt;[access <span class="hljs-keyword">token</span>](#auth)&gt;</code></pre>
<p>OR</p>
<pre><code>curl -X <span class="hljs-keyword">POST</span> http:<span class="hljs-comment">//ricci.cpnv-es.ch/api/auth/jwt_get_token \</span>
--data <span class="hljs-string">"{'token':"</span>&lt;[access <span class="hljs-keyword">token</span>](#auth)&gt;<span class="hljs-string">"}"</span></code></pre>
<p>OR</p>
<pre><code>curl -X POST <span class="hljs-link_url">http://ricci.cpnv-es.ch/api/auth/jwt_get_token?token="&lt;</span>[<span class="hljs-link_label">access token</span>](#auth)&gt;"</code></pre>
<ul>
<li>
<p>Request (application/json)</p>
<ul>
<li>
<p>Body</p>
<pre><code>{
      "<span class="hljs-attribute">token</span>": <span class="hljs-value"><span class="hljs-string">"[access token](#auth)"</span>
  </span>}</code></pre>
</li>
</ul>
</li>
<li>
<p>Response 200 (application/json)</p>
<ul>
<li>
<p>Body</p>
<pre><code>{
      "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
      "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">token</span>": <span class="hljs-value"><span class="hljs-string">"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hcGlcL2F1dGhcL2p3dFwvZ2V0X3Rva2VuIiwiaWF0IjoxNDYwNzAyNTk2LCJleHAiOjE0NjA3NjI1OTYsIm5iZiI6MTQ2MDcwMjU5NiwianRpIjoiNTBmMTVkMzE5NzA4ODhjMjE3N2ZiYzVjZjRiNDlhYjgifQ.xdk3663b3YYFPaesOlPwDK6rf6ajhO5Kx0NQ3sa7jjI"</span></span>,
          "<span class="hljs-attribute">ttl</span>": <span class="hljs-value"><span class="hljs-number">1000</span></span>,
          "<span class="hljs-attribute">refresh_ttl</span>": <span class="hljs-value"><span class="hljs-number">20160</span></span>,
          "<span class="hljs-attribute">user_id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
      </span>}
  </span>}</code></pre>
</li>
</ul>
</li>
</ul>
<h2 id="header-invalidates-a-token,-making-it-unusable-again!!">Invalidates a token, making it unusable again!! <a class="permalink" href="#header-invalidates-a-token,-making-it-unusable-again!!" aria-hidden="true">¶</a></h2>
<ul>
<li>Example</li>
</ul>
<pre><code>curl -X <span class="hljs-keyword">POST</span> http:<span class="hljs-comment">//ricci.cpnv-es.ch/api/auth/jwt_get_token \</span>
--header "Authorization: bearer &lt;[access <span class="hljs-keyword">token</span>](#auth)&gt;</code></pre>
<p>OR
curl -X POST <a href="http://ricci.cpnv-es.ch/api/auth/jwt_get_token">http://ricci.cpnv-es.ch/api/auth/jwt_get_token</a> <br>
–data “{‘token’:”&lt;<a href="#auth">access token</a>&gt;&quot;}&quot;</p>
<pre><code>OR [POST /auth/jwt/logout]
curl -X POST <span class="hljs-link_url">http://ricci.cpnv-es.ch/api/auth/jwt_get_token?token="&lt;</span>[<span class="hljs-link_label">access token</span>](#auth)&gt;"</code></pre>
<ul>
<li>
<p>Request (application/json)</p>
<ul>
<li>
<p>Body</p>
<pre><code>{
      "<span class="hljs-attribute">token</span>": <span class="hljs-value"><span class="hljs-string">"[access token](#auth)"</span>
  </span>}</code></pre>
</li>
</ul>
</li>
<li>
<p>Response 204 (application/json)</p>
<ul>
<li>
<p>Body</p>
<pre><code>[]</code></pre>
</li>
</ul>
</li>
</ul>
</div><div id="users" class="resource"><h3 class="resource-heading">Users <a href="#users" class="permalink">&nbsp;&para;</a></h3><a name="users">
User resource .
<p>To access any of the users actions, you must be authenticated</p>
<h2 id="header--3"><a name="user-list"></a> <a class="permalink" href="#header--3" aria-hidden="true">¶</a></h2>
<p>Get the list of all users. [GET /user]
This method may not be accessible to everyone. It is considered private.</p>
<ul>
<li>Example</li>
</ul>
<pre><code>curl -X GET http://ricci.cpnv-es.ch/api/v1/users \
-<span class="ruby">-header <span class="hljs-string">"Authorization: bearer &lt;[access token](#auth)&gt;
</span></span>-<span class="ruby"><span class="hljs-string">-data "</span>{}<span class="hljs-string">"
</span></span></code></pre>
<ul>
<li>
<p>Request (application/json)</p>
<ul>
<li>
<p>Body</p>
<pre><code>[]</code></pre>
</li>
</ul>
</li>
<li>
<p>Response 200 (application/json)</p>
<ul>
<li>
<p>Body</p>
<pre><code>{
      "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
      "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"....SOmeData"</span>
  </span>}</code></pre>
</li>
</ul>
</li>
</ul>
<div id="users-post" class="action post"><h4 class="action-heading"><div class="name">Create a new user.</div><a href="#users-post" class="method post">POST</a><code class="uri">/user</code></h4><p>This endpoint can be considered private. Only administrators, with the right token can access this method.</p>
<h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/user</span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>token</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The authentification token.</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">username</span>": <span class="hljs-value"><span class="hljs-string">"someUsername"</span></span>,
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"SomeSuperSecretPassword"</span></span>,
  "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"an-email@something.com"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"....SOmeData"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"The token you provided has unauthorized access to this resource"</span></span>,
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"unauthorized token"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"The token could not be parsed"</span></span>,
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"malformed token"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="users-get" class="action get"><h4 class="action-heading"><div class="name">Display the specified resource.</div><a href="#users-get" class="method get">GET</a><code class="uri">/user</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -X GET http://ricci.cpnv-es.ch/api/v1/users/{<span class="hljs-variable">$id</span>} \
--header <span class="hljs-string">"Authorization: bearer &lt;[access token](#auth)&gt;
</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/user</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"....SOmeData"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="users-patch" class="action patch"><h4 class="action-heading"><div class="name">Update the specified resource in storage.</div><a href="#users-patch" class="method patch">PATCH</a><code class="uri">/user</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -X PATCH http://ricci.cpnv-es.ch/api/v1/users/{<span class="hljs-variable">$id</span>} \
--header <span class="hljs-string">"Authorization: bearer &lt;[access token](#auth)&gt;
--data "</span>{<span class="hljs-string">"..some data"</span>}<span class="hljs-string">"
</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method patch">PATCH</span>&nbsp;<span class="uri"><span class="hostname"></span>/user</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"....SOmeData"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="directories" class="resource"><h3 class="resource-heading">Directories <a href="#directories" class="permalink">&nbsp;&para;</a></h3><p>Class DirectoryController</p>
<div id="directories-get" class="action get"><h4 class="action-heading"><div class="name">Gets the list of all the users directories</div><a href="#directories-get" class="method get">GET</a><code class="uri">/v1/directory</code></h4><ul>
<li>Example</li>
</ul>
<pre><code><span class="hljs-label">curl</span> -X <span class="hljs-preprocessor">GET</span> http://ricci.cpnv-es.ch/api/<span class="hljs-literal">v1</span>/directory</code></pre>
<h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/directory</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
        "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"something.jpg"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/something.jpg"</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/something.jpg"</span></span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"something.jpg"</span>
      </span>}
    ]</span>,
    "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/"</span></span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
    "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">""</span></span>,
    "<span class="hljs-attribute">children</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/molestiae"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/molestiae"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"2"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/molestiae/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/molestiae/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"molestiae"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">3</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/architecto"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/architecto"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"3"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/architecto/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/architecto/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"architecto"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">4</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/quo"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/quo"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">3</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"4"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/quo/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/quo/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"quo"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/aut"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/aut"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">4</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"5"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/aut/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/aut/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"aut"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/dolore"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/dolore"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"6"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/dolore/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/dolore/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"dolore"</span>
      </span>}
    ]
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="directories-post" class="action post"><h4 class="action-heading"><div class="name">Store a new directory</div><a href="#directories-post" class="method post">POST</a><code class="uri">/v1/directory</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -X <span class="hljs-keyword">POST</span> http:<span class="hljs-comment">//ricci.cpnv-es.ch/api/v1/directory \</span>
--data <span class="hljs-string">"{"</span>path<span class="hljs-string">": "</span>/<span class="hljs-keyword">test</span><span class="hljs-string">"}"</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/directory</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/test"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">10</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/test"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">files</span>": <span class="hljs-value">[]
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="directories-get-1" class="action get"><h4 class="action-heading"><div class="name">Show a specific directory resource</div><a href="#directories-get-1" class="method get">GET</a><code class="uri">/v1/directory</code></h4><h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/directory</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">directory</span>": <span class="hljs-value"><span class="hljs-string">"1"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
        "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"something.jpg"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/something.jpg"</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/something.jpg"</span></span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"something.jpg"</span>
      </span>}
    ]</span>,
    "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/"</span></span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
    "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">""</span></span>,
    "<span class="hljs-attribute">children</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/molestiae"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/molestiae"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"2"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/molestiae/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/molestiae/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"molestiae"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">3</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/architecto"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/architecto"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"3"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/architecto/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/architecto/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"architecto"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">4</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/quo"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/quo"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">3</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"4"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/quo/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/quo/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"quo"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/aut"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/aut"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">4</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"5"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/aut/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/aut/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"aut"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/dolore"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/dolore"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"6"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/dolore/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/dolore/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"dolore"</span>
      </span>}
    ]
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="directories-get-2" class="action get"><h4 class="action-heading"><div class="name">Lists all directories in a specified path</div><a href="#directories-get-2" class="method get">GET</a><code class="uri">/v1/directory/tree</code></h4><ul>
<li>Example</li>
</ul>
<pre><code><span class="hljs-label">curl</span> -X <span class="hljs-preprocessor">GET</span> http://ricci.cpnv-es.ch/api/<span class="hljs-literal">v1</span>/tree</code></pre>
<h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/directory/tree</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
        "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"something.jpg"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/something.jpg"</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/something.jpg"</span></span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"something.jpg"</span>
      </span>}
    ]</span>,
    "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/"</span></span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
    "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">""</span></span>,
    "<span class="hljs-attribute">children</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/molestiae"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/molestiae"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"2"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/molestiae/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/molestiae/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"molestiae"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">3</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/architecto"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/architecto"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">2</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"3"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/architecto/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/architecto/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"architecto"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">4</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/quo"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/quo"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">3</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"4"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/quo/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/quo/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"quo"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/aut"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/aut"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">4</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"5"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/aut/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/aut/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"aut"</span>
      </span>},
      {
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">6</span></span>,
        "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
        "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/dolore"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:46"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
        "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/dolore"</span></span>,
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"directory"</span></span>,
        "<span class="hljs-attribute">files</span>": <span class="hljs-value">[
          {
            "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>,
            "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
            "<span class="hljs-attribute">folder_id</span>": <span class="hljs-value"><span class="hljs-string">"6"</span></span>,
            "<span class="hljs-attribute">storage</span>": <span class="hljs-value"><span class="hljs-string">"local"</span></span>,
            "<span class="hljs-attribute">filename</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:47"</span></span>,
            "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"file"</span></span>,
            "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/dolore/image.jpg"</span></span>,
            "<span class="hljs-attribute">storage_path</span>": <span class="hljs-value"><span class="hljs-string">"/app/user_data/id_1/dolore/image.jpg"</span></span>,
            "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"image.jpg"</span>
          </span>}
        ]</span>,
        "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"dolore"</span>
      </span>}
    ]
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="directories-patch" class="action patch"><h4 class="action-heading"><div class="name">Update a directory</div><a href="#directories-patch" class="method patch">PATCH</a><code class="uri">/v1/directory/{directory}</code></h4><p>This can be seen as a move operation, it is prefered you use the <code>move</code> method</p>
<h4 id="header-example">Example <a class="permalink" href="#header-example" aria-hidden="true">¶</a></h4>
<pre><code><span class="hljs-label">curl</span> -X POST http://ricci.cpnv-es.ch/api/<span class="hljs-literal">v1</span>/directory/<span class="hljs-number">10</span> \
--<span class="hljs-preprocessor">data</span> <span class="hljs-string">"{"</span>path<span class="hljs-string">": "</span>/another_place<span class="hljs-string">"}"</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method patch">PATCH</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/directory/<span class="hljs-attribute" title="directory">directory</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>directory</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the directory you want to destroy</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/test"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">10</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">parent_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">path</span>": <span class="hljs-value"><span class="hljs-string">"/another_place"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
    "<span class="hljs-attribute">files</span>": <span class="hljs-value">[]
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">location</span>: <span class="hljs-string">http://ricci.cpnv-es.ch/api/v1/directory/1</span></code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"The token could not be parsed"</span></span>,
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"malformed_token"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>204</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"The token you provided has unauthorized access to this resource"</span></span>,
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"unauthorized token"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"The token could not be parsed"</span></span>,
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"malformed_token"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>404</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"not found Calendar"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="calendar" class="resource"><h3 class="resource-heading">Calendar <a href="#calendar" class="permalink">&nbsp;&para;</a></h3><p>Calendar resource repsientation</p>
<div id="calendar-get" class="action get"><h4 class="action-heading"><div class="name">Display all the calendars for a user.</div><a href="#calendar-get" class="method get">GET</a><code class="uri">/v1/calendar</code></h4><ul>
<li>Example</li>
</ul>
<pre><code><span class="hljs-label">curl</span> -X <span class="hljs-preprocessor">GET</span> http://ricci.cpnv-es.ch/api/<span class="hljs-literal">v1</span>/calendar</code></pre>
<h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
      "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
      "<span class="hljs-attribute">title</span>": <span class="hljs-value"><span class="hljs-string">"My awesome new calendar"</span></span>,
      "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
      "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
      "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
      "<span class="hljs-attribute">events</span>": <span class="hljs-value">[
        {
          "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
          "<span class="hljs-attribute">uid</span>": <span class="hljs-value"><span class="hljs-string">"950b14c0-029b-11e6-b188-d375626a8db0"</span></span>,
          "<span class="hljs-attribute">calendar_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
          "<span class="hljs-attribute">summary</span>": <span class="hljs-value"><span class="hljs-string">"Eius sit omnis praesentium et quibusdam provident sapiente."</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Aut perferendis error itaque quam. Quia enim saepe et ut eum tempore est. Repellat dolores veniam harum minus commodi nesciunt."</span></span>,
          "<span class="hljs-attribute">location</span>": <span class="hljs-value"><span class="hljs-string">"6345 Coralie Estates Apt. 820\nWizaton, ID 97717"</span></span>,
          "<span class="hljs-attribute">start_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-13 09:52:45"</span></span>,
          "<span class="hljs-attribute">end_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-17 05:20:23"</span></span>,
          "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ACCEPTED"</span></span>,
          "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
          "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
          "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
        </span>}
      ]
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="calendar-post" class="action post"><h4 class="action-heading"><div class="name">Store a newly created calendar in storage.</div><a href="#calendar-post" class="method post">POST</a><code class="uri">/v1/calendar</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -X POST <span class="hljs-string">http:</span><span class="hljs-comment">//ricci.cpnv-es.ch/api/v1/calendar \</span>
--data <span class="hljs-string">"{"</span>title<span class="hljs-string">":"</span>something <span class="hljs-keyword">new</span><span class="hljs-string">"}"</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">title</span>": <span class="hljs-value"><span class="hljs-string">"a title name or something"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">title</span>": <span class="hljs-value"><span class="hljs-string">"My awesome new calendar"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="calendar-get-1" class="action get"><h4 class="action-heading"><div class="name">Display the specified resource.</div><a href="#calendar-get-1" class="method get">GET</a><code class="uri">/v1/calendar/{calendar}</code></h4><ul>
<li>Example</li>
</ul>
<pre><code><span class="hljs-label">curl</span> -X <span class="hljs-preprocessor">GET</span> http://ricci.cpnv-es.ch/api/<span class="hljs-literal">v1</span>/calendar/<span class="hljs-number">1</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar/<span class="hljs-attribute" title="calendar">calendar</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
      "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
      "<span class="hljs-attribute">title</span>": <span class="hljs-value"><span class="hljs-string">"My awesome new calendar"</span></span>,
      "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
      "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
      "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
      "<span class="hljs-attribute">events</span>": <span class="hljs-value">[
        {
          "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
          "<span class="hljs-attribute">uid</span>": <span class="hljs-value"><span class="hljs-string">"950b14c0-029b-11e6-b188-d375626a8db0"</span></span>,
          "<span class="hljs-attribute">calendar_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
          "<span class="hljs-attribute">summary</span>": <span class="hljs-value"><span class="hljs-string">"Eius sit omnis praesentium et quibusdam provident sapiente."</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Aut perferendis error itaque quam. Quia enim saepe et ut eum tempore est. Repellat dolores veniam harum minus commodi nesciunt."</span></span>,
          "<span class="hljs-attribute">location</span>": <span class="hljs-value"><span class="hljs-string">"6345 Coralie Estates Apt. 820\nWizaton, ID 97717"</span></span>,
          "<span class="hljs-attribute">start_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-13 09:52:45"</span></span>,
          "<span class="hljs-attribute">end_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-17 05:20:23"</span></span>,
          "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ACCEPTED"</span></span>,
          "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
          "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
          "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
        </span>}
      ]
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="calendar-patch" class="action patch"><h4 class="action-heading"><div class="name">Update the specified resource in storage.</div><a href="#calendar-patch" class="method patch">PATCH</a><code class="uri">/v1/calendar/{calendar}</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -X PATCH <span class="hljs-string">http:</span><span class="hljs-comment">//ricci.cpnv-es.ch/api/v1/calendar/1 \</span>
--data <span class="hljs-string">"{"</span>title<span class="hljs-string">":"</span>a <span class="hljs-keyword">new</span> title<span class="hljs-string">"}"</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method patch">PATCH</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar/<span class="hljs-attribute" title="calendar">calendar</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">title</span>": <span class="hljs-value"><span class="hljs-string">"a new title"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">title</span>": <span class="hljs-value"><span class="hljs-string">"a new title"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="calendar-delete" class="action delete"><h4 class="action-heading"><div class="name">Remove the specified resource from storage.</div><a href="#calendar-delete" class="method delete">DELETE</a><code class="uri">/v1/calendar/{calendar}</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -<span class="hljs-constant">X</span> <span class="hljs-constant">DELETE</span> <span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/ricci.cpnv-es.ch/api</span><span class="hljs-regexp">/v1/calendar</span><span class="hljs-regexp">/1
</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method delete">DELETE</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar/<span class="hljs-attribute" title="calendar">calendar</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>204</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div><div id="calendarevent" class="resource"><h3 class="resource-heading">CalendarEvent <a href="#calendarevent" class="permalink">&nbsp;&para;</a></h3><p>Class CalendarEventController</p>
<div id="calendarevent-get" class="action get"><h4 class="action-heading"><div class="name">Display a listing of calendar events.</div><a href="#calendarevent-get" class="method get">GET</a><code class="uri">/v1/calendar/{calendar}/event</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -<span class="hljs-constant">X</span> <span class="hljs-constant">GET</span> <span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/ricci.cpnv-es.ch/api</span><span class="hljs-regexp">/v1/calendar</span><span class="hljs-regexp">/1/event</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar/<span class="hljs-attribute" title="calendar">calendar</span>/event</span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
      "<span class="hljs-attribute">uid</span>": <span class="hljs-value"><span class="hljs-string">"950b14c0-029b-11e6-b188-d375626a8db0"</span></span>,
      "<span class="hljs-attribute">calendar_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
      "<span class="hljs-attribute">summary</span>": <span class="hljs-value"><span class="hljs-string">"Eius sit omnis praesentium et quibusdam provident sapiente."</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Aut perferendis error itaque quam. Quia enim saepe et ut eum tempore est. Repellat dolores veniam harum minus commodi nesciunt."</span></span>,
      "<span class="hljs-attribute">location</span>": <span class="hljs-value"><span class="hljs-string">"6345 Coralie Estates Apt. 820\nWizaton, ID 97717"</span></span>,
      "<span class="hljs-attribute">start_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-13 09:52:45"</span></span>,
      "<span class="hljs-attribute">end_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-17 05:20:23"</span></span>,
      "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ACCEPTED"</span></span>,
      "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
      "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
      "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="calendarevent-post" class="action post"><h4 class="action-heading"><div class="name">Store a newly created calendar event in storage.</div><a href="#calendarevent-post" class="method post">POST</a><code class="uri">/v1/calendar/{calendar}/event</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -<span class="hljs-constant">X POST </span><span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/ricci.cpnv-es.ch/api</span><span class="hljs-regexp">/v1/calendar</span><span class="hljs-regexp">/1/event</span> \
--data <span class="hljs-string">"{"</span>title<span class="hljs-string">":"</span>something new<span class="hljs-string">"}"</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar/<span class="hljs-attribute" title="calendar">calendar</span>/event</span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">summary</span>": <span class="hljs-value"><span class="hljs-string">"a title name or something"</span></span>,
  "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"this is an optional field"</span></span>,
  "<span class="hljs-attribute">location</span>": <span class="hljs-value"><span class="hljs-string">"optional field"</span></span>,
  "<span class="hljs-attribute">start_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-13 09:52:45"</span></span>,
  "<span class="hljs-attribute">end_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-17 05:20:23"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">uid</span>": <span class="hljs-value"><span class="hljs-string">"950b14c0-029b-11e6-b188-d375626a8db0"</span></span>,
    "<span class="hljs-attribute">calendar_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">summary</span>": <span class="hljs-value"><span class="hljs-string">"Eius sit omnis praesentium et quibusdam provident sapiente."</span></span>,
    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Aut perferendis error itaque quam. Quia enim saepe et ut eum tempore est. Repellat dolores veniam harum minus commodi nesciunt."</span></span>,
    "<span class="hljs-attribute">location</span>": <span class="hljs-value"><span class="hljs-string">"6345 Coralie Estates Apt. 820\nWizaton, ID 97717"</span></span>,
    "<span class="hljs-attribute">start_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-13 09:52:45"</span></span>,
    "<span class="hljs-attribute">end_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-17 05:20:23"</span></span>,
    "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ACCEPTED"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="calendarevent-post-1" class="action post"><h4 class="action-heading"><div class="name">Display an event resource.</div><a href="#calendarevent-post-1" class="method post">POST</a><code class="uri">/v1/calendar/{calendar}/event/{event}</code></h4><ul>
<li>Example</li>
</ul>
<pre><code><span class="hljs-label">curl</span> -X <span class="hljs-preprocessor">GET</span> http://ricci.cpnv-es.ch/api/<span class="hljs-literal">v1</span>/calendar1/event/<span class="hljs-number">1</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar/<span class="hljs-attribute" title="calendar">calendar</span>/event/<span class="hljs-attribute" title="event">event</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to view</p>
</dd><dt>event</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the event you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">calendar</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">event</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">uid</span>": <span class="hljs-value"><span class="hljs-string">"950b14c0-029b-11e6-b188-d375626a8db0"</span></span>,
    "<span class="hljs-attribute">calendar_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">summary</span>": <span class="hljs-value"><span class="hljs-string">"Eius sit omnis praesentium et quibusdam provident sapiente."</span></span>,
    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Aut perferendis error itaque quam. Quia enim saepe et ut eum tempore est. Repellat dolores veniam harum minus commodi nesciunt."</span></span>,
    "<span class="hljs-attribute">location</span>": <span class="hljs-value"><span class="hljs-string">"6345 Coralie Estates Apt. 820\nWizaton, ID 97717"</span></span>,
    "<span class="hljs-attribute">start_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-13 09:52:45"</span></span>,
    "<span class="hljs-attribute">end_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-17 05:20:23"</span></span>,
    "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ACCEPTED"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="calendarevent-patch" class="action patch"><h4 class="action-heading"><div class="name">Update the specified resource in storage.</div><a href="#calendarevent-patch" class="method patch">PATCH</a><code class="uri">/v1/calendar/{calendar}/event/{event}</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -X PATCH http:<span class="hljs-comment">//ricci.cpnv-es.ch/api/v1/calendar/1/event/1 \</span>
--data <span class="hljs-string">"{"</span>summary<span class="hljs-string">":"</span><span class="hljs-keyword">new</span> summary<span class="hljs-string">","</span>description<span class="hljs-string">":"</span><span class="hljs-keyword">new</span> description<span class="hljs-string">","</span>location<span class="hljs-string">":"</span><span class="hljs-keyword">new</span> location<span class="hljs-string">","</span>start_date<span class="hljs-string">":"</span><span class="hljs-number">2016</span>-<span class="hljs-number">05</span>-<span class="hljs-number">14</span> <span class="hljs-number">09</span>:<span class="hljs-number">00</span>:<span class="hljs-number">00</span><span class="hljs-string">","</span>end_date<span class="hljs-string">":"</span><span class="hljs-number">2016</span>-<span class="hljs-number">05</span>-<span class="hljs-number">14</span> <span class="hljs-number">12</span>:<span class="hljs-number">00</span>:<span class="hljs-number">00</span><span class="hljs-string">"}"</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method patch">PATCH</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar/<span class="hljs-attribute" title="calendar">calendar</span>/event/<span class="hljs-attribute" title="event">event</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to update</p>
</dd><dt>event</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the event you want to update</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">summary</span>": <span class="hljs-value"><span class="hljs-string">"new summary"</span></span>,
  "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"new description"</span></span>,
  "<span class="hljs-attribute">location</span>": <span class="hljs-value"><span class="hljs-string">"new location"</span></span>,
  "<span class="hljs-attribute">start_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-05-14 09:00:00"</span></span>,
  "<span class="hljs-attribute">end_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-05-14 12:00:00"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">uid</span>": <span class="hljs-value"><span class="hljs-string">"950b14c0-029b-11e6-b188-d375626a8db0"</span></span>,
    "<span class="hljs-attribute">calendar_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">summary</span>": <span class="hljs-value"><span class="hljs-string">"new summary"</span></span>,
    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"a new description"</span></span>,
    "<span class="hljs-attribute">location</span>": <span class="hljs-value"><span class="hljs-string">"a new location"</span></span>,
    "<span class="hljs-attribute">start_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-05-14 09:00:00"</span></span>,
    "<span class="hljs-attribute">end_date</span>": <span class="hljs-value"><span class="hljs-string">"2016-05-14 12:00:00"</span></span>,
    "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ACCEPTED"</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:52"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="calendarevent-delete" class="action delete"><h4 class="action-heading"><div class="name">Remove the specified resource from storage.</div><a href="#calendarevent-delete" class="method delete">DELETE</a><code class="uri">/v1/calendar/{calendar}/event/{event}</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -<span class="hljs-constant">X</span> <span class="hljs-constant">DELETE</span> <span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/ricci.cpnv-es.ch/api</span><span class="hljs-regexp">/v1/calendar</span><span class="hljs-regexp">/1/event</span><span class="hljs-regexp">/1
</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method delete">DELETE</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/calendar/<span class="hljs-attribute" title="calendar">calendar</span>/event/<span class="hljs-attribute" title="event">event</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to update</p>
</dd><dt>event</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the event you want to update</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>204</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div><div id="contact" class="resource"><h3 class="resource-heading">Contact <a href="#contact" class="permalink">&nbsp;&para;</a></h3><p>Class ContactController</p>
<div id="contact-get" class="action get"><h4 class="action-heading"><div class="name">Display a listing of the resource.</div><a href="#contact-get" class="method get">GET</a><code class="uri">/v1/contact</code></h4><ul>
<li>Example</li>
</ul>
<pre><code><span class="hljs-label">curl</span> -X <span class="hljs-preprocessor">GET</span> http://ricci.cpnv-es.ch/api/<span class="hljs-literal">v1</span>/contact</code></pre>
<h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/contact</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
      "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Monty Conn"</span></span>,
      "<span class="hljs-attribute">photo</span>": <span class="hljs-value"><span class="hljs-string">"http://lorempixel.com/640/480/?16928"</span></span>,
      "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"oconn@koch.info"</span></span>,
        "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"ngoldner@leannon.net"</span>
      </span>}</span>,
      "<span class="hljs-attribute">addresses</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"8075 Hamill Roads\nBartonburgh, OH 84588"</span></span>,
        "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"5337 Junius Falls\nWest Russ, MS 29489-4985"</span>
      </span>}</span>,
      "<span class="hljs-attribute">phoneNumbers</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"112-373-4580"</span></span>,
        "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"+99(2)9748549210"</span>
      </span>}</span>,
      "<span class="hljs-attribute">company</span>": <span class="hljs-value"><span class="hljs-string">"Watsica, Schmeler and Boyer"</span></span>,
      "<span class="hljs-attribute">job_title</span>": <span class="hljs-value"><span class="hljs-string">"Ms."</span></span>,
      "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:53"</span></span>,
      "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:53"</span></span>,
      "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span></span>,
      "<span class="hljs-attribute">owner</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">username</span>": <span class="hljs-value"><span class="hljs-string">"Admin"</span></span>,
        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"thomas.ricci@cpnv.ch"</span></span>,
        "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
        "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:45"</span></span>,
        "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
      </span>}
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="contact-post" class="action post"><h4 class="action-heading"><div class="name">Store a newly created resource in storage.</div><a href="#contact-post" class="method post">POST</a><code class="uri">/v1/contact</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -<span class="hljs-constant">X</span> <span class="hljs-constant">POST</span> <span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/ricci.cpnv-es.ch/api</span><span class="hljs-regexp">/v1/contact</span> \
--data <span class="hljs-string">"{"</span>name<span class="hljs-string">": "</span><span class="hljs-constant">Monty</span> <span class="hljs-constant">Conn</span><span class="hljs-string">","</span>photo<span class="hljs-string">": "</span><span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/lorempixel.com/</span><span class="hljs-number">640</span>/<span class="hljs-number">480</span>/?<span class="hljs-number">16928</span><span class="hljs-string">","</span>emails<span class="hljs-string">": {"</span>work<span class="hljs-string">": "</span>oconn<span class="hljs-variable">@koch</span>.info<span class="hljs-string">","</span>private<span class="hljs-string">": "</span>ngoldner<span class="hljs-variable">@leannon</span>.net<span class="hljs-string">"},"</span>addresses<span class="hljs-string">": {"</span>work<span class="hljs-string">": "</span><span class="hljs-number">8075</span> <span class="hljs-constant">Hamill</span> <span class="hljs-constant">RoadsnBartonburgh</span>, <span class="hljs-constant">OH</span> <span class="hljs-number">84588</span><span class="hljs-string">","</span>private<span class="hljs-string">": "</span><span class="hljs-number">5337</span> <span class="hljs-constant">Junius</span> <span class="hljs-constant">FallsnWest</span> <span class="hljs-constant">Russ</span>, <span class="hljs-constant">MS</span> <span class="hljs-number">29489</span>-<span class="hljs-number">4985</span><span class="hljs-string">"},"</span>phoneNumbers<span class="hljs-string">": {"</span>work<span class="hljs-string">": "</span><span class="hljs-number">112</span>-<span class="hljs-number">373</span>-<span class="hljs-number">4580</span><span class="hljs-string">","</span>private<span class="hljs-string">": "</span>+<span class="hljs-number">99</span>(<span class="hljs-number">2</span>)<span class="hljs-number">9748549210</span><span class="hljs-string">"},"</span>company<span class="hljs-string">": "</span><span class="hljs-constant">Watsica</span>, <span class="hljs-constant">Schmeler</span> <span class="hljs-keyword">and</span> <span class="hljs-constant">Boyer</span><span class="hljs-string">", "</span>job_title<span class="hljs-string">": "</span><span class="hljs-constant">Ms</span>.<span class="hljs-string">"}"</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method post">POST</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/contact</span></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Monty Conn"</span></span>,
  "<span class="hljs-attribute">photo</span>": <span class="hljs-value"><span class="hljs-string">"http://lorempixel.com/640/480/?16928"</span></span>,
  "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"oconn@koch.info"</span></span>,
    "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"ngoldner@leannon.net"</span>
  </span>}</span>,
  "<span class="hljs-attribute">addresses</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"8075 Hamill Roads\nBartonburgh, OH 84588"</span></span>,
    "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"5337 Junius Falls\nWest Russ, MS 29489-4985"</span>
  </span>}</span>,
  "<span class="hljs-attribute">phoneNumbers</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"112-373-4580"</span></span>,
    "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"+99(2)9748549210"</span>
  </span>}</span>,
  "<span class="hljs-attribute">company</span>": <span class="hljs-value"><span class="hljs-string">"Watsica, Schmeler and Boyer"</span></span>,
  "<span class="hljs-attribute">job_title</span>": <span class="hljs-value"><span class="hljs-string">"Ms."</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Monty Conn"</span></span>,
    "<span class="hljs-attribute">photo</span>": <span class="hljs-value"><span class="hljs-string">"http://lorempixel.com/640/480/?16928"</span></span>,
    "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"oconn@koch.info"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"ngoldner@leannon.net"</span>
    </span>}</span>,
    "<span class="hljs-attribute">addresses</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"8075 Hamill Roads\nBartonburgh, OH 84588"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"5337 Junius Falls\nWest Russ, MS 29489-4985"</span>
    </span>}</span>,
    "<span class="hljs-attribute">phoneNumbers</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"112-373-4580"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"+99(2)9748549210"</span>
    </span>}</span>,
    "<span class="hljs-attribute">company</span>": <span class="hljs-value"><span class="hljs-string">"Watsica, Schmeler and Boyer"</span></span>,
    "<span class="hljs-attribute">job_title</span>": <span class="hljs-value"><span class="hljs-string">"Ms."</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:53"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:53"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="contact-get-1" class="action get"><h4 class="action-heading"><div class="name">Display the specified contact resource.</div><a href="#contact-get-1" class="method get">GET</a><code class="uri">/v1/contact/{contact}</code></h4><ul>
<li>Example</li>
</ul>
<pre><code><span class="hljs-label">curl</span> -X <span class="hljs-preprocessor">GET</span> http://ricci.cpnv-es.ch/api/<span class="hljs-literal">v1</span>/contact/<span class="hljs-number">1</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method get">GET</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/contact/<span class="hljs-attribute" title="contact">contact</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>contact</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the contact you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Monty Conn"</span></span>,
    "<span class="hljs-attribute">photo</span>": <span class="hljs-value"><span class="hljs-string">"http://lorempixel.com/640/480/?16928"</span></span>,
    "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"oconn@koch.info"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"ngoldner@leannon.net"</span>
    </span>}</span>,
    "<span class="hljs-attribute">addresses</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"8075 Hamill Roads\nBartonburgh, OH 84588"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"5337 Junius Falls\nWest Russ, MS 29489-4985"</span>
    </span>}</span>,
    "<span class="hljs-attribute">phoneNumbers</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"112-373-4580"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"+99(2)9748549210"</span>
    </span>}</span>,
    "<span class="hljs-attribute">company</span>": <span class="hljs-value"><span class="hljs-string">"Watsica, Schmeler and Boyer"</span></span>,
    "<span class="hljs-attribute">job_title</span>": <span class="hljs-value"><span class="hljs-string">"Ms."</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:53"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:53"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="contact-patch" class="action patch"><h4 class="action-heading"><div class="name">Update the specified resource in storage.</div><a href="#contact-patch" class="method patch">PATCH</a><code class="uri">/v1/contact/{contact}</code></h4><p>You are not obligated to provide every field to update the resource. Only it’s id is required</p>
<ul>
<li>Example</li>
</ul>
<pre><code>curl -<span class="hljs-constant">X</span> <span class="hljs-constant">PATCH</span> <span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/ricci.cpnv-es.ch/api</span><span class="hljs-regexp">/v1/contact</span><span class="hljs-regexp">/1
</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method patch">PATCH</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/contact/<span class="hljs-attribute" title="contact">contact</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>contact</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the contact you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">contact</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
  "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"new name"</span></span>,
  "<span class="hljs-attribute">photo</span>": <span class="hljs-value"><span class="hljs-string">"http://lorempixel.com/640/480/?16928"</span></span>,
  "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"oconn@koch.info"</span></span>,
    "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"ngoldner@leannon.net"</span>
  </span>}</span>,
  "<span class="hljs-attribute">addresses</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"8075 Hamill Roads\nBartonburgh, OH 84588"</span></span>,
    "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"5337 Junius Falls\nWest Russ, MS 29489-4985"</span>
  </span>}</span>,
  "<span class="hljs-attribute">phoneNumbers</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"112-373-4580"</span></span>,
    "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"+99(2)9748549210"</span>
  </span>}</span>,
  "<span class="hljs-attribute">company</span>": <span class="hljs-value"><span class="hljs-string">"Watsica, Schmeler and Boyer"</span></span>,
  "<span class="hljs-attribute">job_title</span>": <span class="hljs-value"><span class="hljs-string">"Ms."</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"ok"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">owner_id</span>": <span class="hljs-value"><span class="hljs-string">"1"</span></span>,
    "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"new name"</span></span>,
    "<span class="hljs-attribute">photo</span>": <span class="hljs-value"><span class="hljs-string">"http://lorempixel.com/640/480/?16928"</span></span>,
    "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"oconn@koch.info"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"ngoldner@leannon.net"</span>
    </span>}</span>,
    "<span class="hljs-attribute">addresses</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"8075 Hamill Roads\nBartonburgh, OH 84588"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"5337 Junius Falls\nWest Russ, MS 29489-4985"</span>
    </span>}</span>,
    "<span class="hljs-attribute">phoneNumbers</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">work</span>": <span class="hljs-value"><span class="hljs-string">"112-373-4580"</span></span>,
      "<span class="hljs-attribute">private</span>": <span class="hljs-value"><span class="hljs-string">"+99(2)9748549210"</span>
    </span>}</span>,
    "<span class="hljs-attribute">company</span>": <span class="hljs-value"><span class="hljs-string">"Watsica, Schmeler and Boyer"</span></span>,
    "<span class="hljs-attribute">job_title</span>": <span class="hljs-value"><span class="hljs-string">"Ms."</span></span>,
    "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:53"</span></span>,
    "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2016-04-14 23:49:53"</span></span>,
    "<span class="hljs-attribute">deleted_at</span>": <span class="hljs-value"><span class="hljs-literal">null</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="contact-delete" class="action delete"><h4 class="action-heading"><div class="name">Remove the specified resource from storage.</div><a href="#contact-delete" class="method delete">DELETE</a><code class="uri">/v1/contact/{calendar}</code></h4><ul>
<li>Example</li>
</ul>
<pre><code>curl -<span class="hljs-constant">X</span> <span class="hljs-constant">DELETE</span> <span class="hljs-symbol">http:</span>/<span class="hljs-regexp">/ricci.cpnv-es.ch/api</span><span class="hljs-regexp">/v1/calendar</span><span class="hljs-regexp">/1
</span></code></pre>
<h4>Example URI</h4><div class="definition"><span class="method delete">DELETE</span>&nbsp;<span class="uri"><span class="hostname"></span>/v1/contact/<span class="hljs-attribute" title="calendar">calendar</span></span></div><div class="title"><strong>URI Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>calendar</dt><dd><code>string</code>&nbsp;<span class="required">(required)</span>&nbsp;<p>The id of the calendar you want to view</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>[]</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>204</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"The token you provided has unauthorized access to this resource"</span></span>,
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"unauthorized token"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"The token could not be parsed"</span></span>,
  "<span class="hljs-attribute">error</span>": <span class="hljs-value"><span class="hljs-string">"malformed_token"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>404</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"error"</span></span>,
  "<span class="hljs-attribute">payload</span>": <span class="hljs-value"><span class="hljs-string">"not found Calendar"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div></section></div></div></div><p style="text-align: center;" class="text-muted">Generated by&nbsp;<a href="https://github.com/danielgtaylor/aglio" class="aglio">aglio</a>&nbsp;on 15 Apr 2016</p><script>/* eslint-env browser */
/* eslint quotes: [2, "single"] */
'use strict';

/*
  Determine if a string ends with another string.
*/
function endsWith(str, suffix) {
    return str.indexOf(suffix, str.length - suffix.length) !== -1;
}

/*
  Get a list of direct child elements by class name.
*/
function childrenByClass(element, name) {
  var filtered = [];

  for (var i = 0; i < element.children.length; i++) {
    var child = element.children[i];
    var classNames = child.className.split(' ');
    if (classNames.indexOf(name) !== -1) {
      filtered.push(child);
    }
  }

  return filtered;
}

/*
  Get an array [width, height] of the window.
*/
function getWindowDimensions() {
  var w = window,
      d = document,
      e = d.documentElement,
      g = d.body,
      x = w.innerWidth || e.clientWidth || g.clientWidth,
      y = w.innerHeight || e.clientHeight || g.clientHeight;

  return [x, y];
}

/*
  Collapse or show a request/response example.
*/
function toggleCollapseButton(event) {
    var button = event.target.parentNode;
    var content = button.parentNode.nextSibling;
    var inner = content.children[0];

    if (button.className.indexOf('collapse-button') === -1) {
      // Clicked without hitting the right element?
      return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        // Currently showing, so let's hide it
        button.className = 'collapse-button';
        content.style.maxHeight = '0px';
    } else {
        // Currently hidden, so let's show it
        button.className = 'collapse-button show';
        content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

function toggleTabButton(event) {
    var i, index;
    var button = event.target;

    // Get index of the current button.
    var buttons = childrenByClass(button.parentNode, 'tab-button');
    for (i = 0; i < buttons.length; i++) {
        if (buttons[i] === button) {
            index = i;
            button.className = 'tab-button active';
        } else {
            buttons[i].className = 'tab-button';
        }
    }

    // Hide other tabs and show this one.
    var tabs = childrenByClass(button.parentNode.parentNode, 'tab');
    for (i = 0; i < tabs.length; i++) {
        if (i === index) {
            tabs[i].style.display = 'block';
        } else {
            tabs[i].style.display = 'none';
        }
    }
}

/*
  Collapse or show a navigation menu. It will not be hidden unless it
  is currently selected or `force` has been passed.
*/
function toggleCollapseNav(event, force) {
    var heading = event.target.parentNode;
    var content = heading.nextSibling;
    var inner = content.children[0];

    if (heading.className.indexOf('heading') === -1) {
      // Clicked without hitting the right element?
      return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
      // Currently showing, so let's hide it, but only if this nav item
      // is already selected. This prevents newly selected items from
      // collapsing in an annoying fashion.
      if (force || window.location.hash && endsWith(event.target.href, window.location.hash)) {
        content.style.maxHeight = '0px';
      }
    } else {
      // Currently hidden, so let's show it
      content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

/*
  Refresh the page after a live update from the server. This only
  works in live preview mode (using the `--server` parameter).
*/
function refresh(body) {
    document.querySelector('body').className = 'preload';
    document.body.innerHTML = body;

    // Re-initialize the page
    init();
    autoCollapse();

    document.querySelector('body').className = '';
}

/*
  Determine which navigation items should be auto-collapsed to show as many
  as possible on the screen, based on the current window height. This also
  collapses them.
*/
function autoCollapse() {
  var windowHeight = getWindowDimensions()[1];
  var itemsHeight = 64; /* Account for some padding */
  var itemsArray = Array.prototype.slice.call(
    document.querySelectorAll('nav .resource-group .heading'));

  // Get the total height of the navigation items
  itemsArray.forEach(function (item) {
    itemsHeight += item.parentNode.offsetHeight;
  });

  // Should we auto-collapse any nav items? Try to find the smallest item
  // that can be collapsed to show all items on the screen. If not possible,
  // then collapse the largest item and do it again. First, sort the items
  // by height from smallest to largest.
  var sortedItems = itemsArray.sort(function (a, b) {
    return a.parentNode.offsetHeight - b.parentNode.offsetHeight;
  });

  while (sortedItems.length && itemsHeight > windowHeight) {
    for (var i = 0; i < sortedItems.length; i++) {
      // Will collapsing this item help?
      var itemHeight = sortedItems[i].nextSibling.offsetHeight;
      if ((itemsHeight - itemHeight <= windowHeight) || i === sortedItems.length - 1) {
        // It will, so let's collapse it, remove its content height from
        // our total and then remove it from our list of candidates
        // that can be collapsed.
        itemsHeight -= itemHeight;
        toggleCollapseNav({target: sortedItems[i].children[0]}, true);
        sortedItems.splice(i, 1);
        break;
      }
    }
  }
}

/*
  Initialize the interactive functionality of the page.
*/
function init() {
    var i, j;

    // Make collapse buttons clickable
    var buttons = document.querySelectorAll('.collapse-button');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].onclick = toggleCollapseButton;

        // Show by default? Then toggle now.
        if (buttons[i].className.indexOf('show') !== -1) {
            toggleCollapseButton({target: buttons[i].children[0]});
        }
    }

    var responseCodes = document.querySelectorAll('.example-names');
    for (i = 0; i < responseCodes.length; i++) {
        var tabButtons = childrenByClass(responseCodes[i], 'tab-button');
        for (j = 0; j < tabButtons.length; j++) {
            tabButtons[j].onclick = toggleTabButton;

            // Show by default?
            if (j === 0) {
                toggleTabButton({target: tabButtons[j]});
            }
        }
    }

    // Make nav items clickable to collapse/expand their content.
    var navItems = document.querySelectorAll('nav .resource-group .heading');
    for (i = 0; i < navItems.length; i++) {
        navItems[i].onclick = toggleCollapseNav;

        // Show all by default
        toggleCollapseNav({target: navItems[i].children[0]});
    }
}

// Initial call to set up buttons
init();

window.onload = function () {
    autoCollapse();
    // Remove the `preload` class to enable animations
    document.querySelector('body').className = '';
};
</script></body></html>