![start2](https://cloud.githubusercontent.com/assets/10303538/6315586/9463fa5c-ba06-11e4-8f30-ce7d8219c27d.png)

# Tag1b

Tag1b for not Pocketmine


## Category

Ali 2.0.0

## Requirements

plugin Tag1b 


## Overview

**Tag1b** is an Advanced Tag1b plugin.

**EvolSoft Website:** http://www.evolsoft.tk

***This Plugin uses the New API. You can't install

You can set custom automatic messages and you can also send messages with /Tagblock  and World z x y with  commands <t>
You can also customize colors (only from MCPE v0.14.0), prefixes, suffixes and intervals. (read documentation)

**Commands:**

<dd><i><b>/TagBlock world z y x hi



**To-Do:**
<brag><tag>
*- Bug fix (if bugs will be found)*

## Documentation

**Text format (Available on PocketMine console and on MCPE v0.11.0 and later):**

**Colors:**

Black ("&0");<br>
Dark Blue ("&1");<br>
Dark Green ("&2");<br>
Dark Aqua ("&3");<br>
Dark Red ("&4");<br>
Dark Purple ("&5");<br>
Gold ("&6");<br>
Gray ("&7");<br>
Dark Gray ("&8");<br>
Blue ("&9");<br>
Green ("&a");<br>
Aqua ("&b");<br>
Red ("&c");<br>
Light Purple ("&d");<br>
Yellow ("&e");<br>
White ("&f");<br>

**Special:**

Obfuscated ("&k");<br>
Bold ("&l");<br>
Strikethrough ("&m");<br>
Underline ("&n");<br>
Italic ("&o");<br>
Reset ("&r");<br>

**Configuration (config.yml):**

```yaml
---
#Available Tags (broadcast messages/popups):
# - {MAXPLAYERS}: Show the maximum number of players supported by the server
# - {TOTALPLAYERS}: Show the number of all online players
# - {PREFIX}: Show prefix
# - {SUFFIX}: Show suffix
# - {TIME}: Show current time
#Available Tags (sendmessage/sendpopup format):
# - {MESSAGE}: Show message
# - {MAXPLAYERS}: Show the maximum number of players supported by the server
# - {TOTALPLAYERS}: Show the number of all online players
# - {PREFIX}: Show prefix
# - {SENDER}: Show sender name
# - {SUFFIX}: Show suffix
# - {TIME}: Show current time
#Prefix
prefix: "Tag1b"
#Suffix
suffix: "[A]"
#Tag1b interval (in seconds)
time: 15
#Command /sm output format
sendmessage-format: "&e[{TIME}] &b[{PREFIX}] {SUFFIX} &a{SENDER}&e>&f {MESSAGE}"
#Date\Time format (replaced in {TIME}). For format codes read http://php.net/manual/en/datetime.formats.php
datetime-format: "H:i:s"
#Enable auto broadcast
broadcast-enabled: true
#Broadcast messages (you can set as many as you want)
messages:
 - "&e[{TIME}] &b[{PREFIX}]&f 1st message"
 - "&e[{TIME}] &b[{PREFIX}]&f 2nd message"
 - "&e[{TIME}] &b[{PREFIX}]&f 3rd message"
#Popup broadcast interval (in seconds)
popup-time: 15
#Popup duration (in seconds)
popup-duration: 5
#Command /sp output format
sendpopup-format: "&a{SENDER}&e>>&f {MESSAGE}"
#Enable auto popup broadcast
popup-broadcast-enabled: true
popups:
 - "&aWelcome to your server"
 - "&d{TOTALPLAYERS} &eof &d{MAXPLAYERS} &eonline"
 - "&bCurrent Time: &a{TIME}"
```

**Commands:**

<dd><b><i>/broadcaster</b> - Broadcaster commands (aliases: [bc, broadcast])</i></dd>
<dd><i><b>/sendmessage &lt;to player (* for all players)&gt; &lt;message&gt;</b> - Send message to player (aliases: [sm, smsg])</i></dd>
<dd><i><b>/sendpopup &lt;to player (* for all players)&gt; &lt;message&gt;</b> - Send popup to player (aliases: [sp, spop])</i></dd>
<br>
**Permissions:**
<br><br>
- <dd><i><b>broadcaster.*</b> - Broadcaster commands permissions.</i>
- <dd><i><b>broadcaster.info</b> - Allows player to read info about Broadcaster.</i>
- <dd><i><b>broadcaster.reload</b> - Allows player to reload Broadcaster.</i>
- <dd><i><b>broadcaster.sendmessage</b> - Allows sending messages to players with /sendmessage command.</i>
- <dd><i><b>broadcaster.sendpopup</b> - Allows sending popups to players with /sendpopup command.</i>
