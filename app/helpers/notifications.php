<?php
function notificationTextTranslate($parameters = [],$lang)
{
    $result = '';
    if (count($parameters) > 0) {
        if ($parameters['type'] == 'newClient') {
            $result = [
                'ar' => 'لقد قام '.$parameters['name'].' بالتسجيل على المنصة وبحاجة إلى التواصل ومراجعة البيانات.',
                'en' => 'Client with the name '.$parameters['name'].' has registered and needs your approval'
            ];
        }
      
      
    }
    return $result[$lang];
}

function notifyManagers($notificationType,$notificationData)
{
    if (in_array($notificationType, ['newClient'])) {
        $PrimeManagers = App\User::where('role','1')->get();
        foreach ($PrimeManagers as $key => $value) {
            $value->notify(new \App\Notifications\AdminNotifications($notificationData));
        }
    }
}

function notificationImageLink($type,$linked_id = '')
{
    $link = getSettingImageLink(getSettingValue('logo'));
    if ($type == 'newClient') {
        $theClient = App\Client::find($linked_id);
        if ($theClient != '') {
            // $link = $theClient->photoLink();
        }
    }
    return $link;
}