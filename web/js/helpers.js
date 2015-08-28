yii = {                                                                                                     
    urls: {                                                                                                 
        saveEdits: '.CJSON::encode(Yii::app()->createUrl('edit/save')).',                                   
        base: '.CJSON::encode(Yii::app()->baseUrl).'                                                        
    }                                                                                                       
};


Yii::app()->clientScript->registerScript('helpers', '                                                           
          yii = {                                                                                                     
              urls: {                                                                                                 
                  saveEdits: '.CJSON::encode(Yii::app()->createUrl('edit/save')).',                                   
                  base: '.CJSON::encode(Yii::app()->baseUrl).'                                                        
              }                                                                                                       
          };                                                                                                          
      ',CClientScript::POS_HEAD); 
      
      
      
$this->registerJs("yii = {                                                                                                     
              urls: {                                                                                                 
                  saveEdits: '.CJSON::encode(Yii::app()->createUrl('edit/save')).',                                   
                  base: '.CJSON::encode(Yii::app()->baseUrl).'                                                        
              }                                                                                                       
          };", View::POS_HEAD, 'helpers');