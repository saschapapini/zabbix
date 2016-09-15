Per prima cosa occorre creare un file con il nome telegrambot.php all'interno della directory /usr/lib/zabbix/alertscripts
Poi all'interno dello Zabbix occorre creare un nuovo Media types
	Name: TelegramBOT
	Type: script
	Script name: telegrambot.php
	Script parameters
		{ALERT.SENDTO}
		{ALERT.SUBJECT}
		{ALERT.MESSAGE}
	Enabled: true
	
	