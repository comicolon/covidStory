<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Weather extends Component
{

    public string $city = 'Seoul';

    public function render()
    {
        $wcArr = $this->getCurrentWeather($this->city);
        $waArr = $this->getAfterWeather($this->city);

        return view('livewire.weather',[
            'wcArr' => $wcArr,
            'waArr' => $waArr,
        ]);

    }


    public function getCurrentWeather($city){

        $apiKey = '6cb7f876798991a9347508b91f5d503d';

        // 현재 날씨
        $w = curl_init('http://api.openweathermap.org/data/2.5/weather?q='.$city.'&units=metric&lang=kr&appid='.$apiKey.'');
        $weather_options = array(
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($w, $weather_options);
        $a = curl_exec($w);
        curl_close($w);

        if (isset($a) && $a) {
            $weather = json_decode($a);

            //    dd($weather);

            $current_temp = $weather->main->temp;
            $current_temp_min = $weather->main->temp_min;
            $current_temp_max = $weather->main->temp_max;
            $current_weather_main = $weather->weather[0]->main;
            $current_weather_description = $weather->weather[0]->description;
            $current_weather_icon = "http://openweathermap.org/img/w/{$weather->weather[0]->icon}.png";
            $current_dt = date('Y-m-d H:i:s', $weather->dt);
            $current_area = $weather->name;

            $resArr = [$current_temp,
                $current_temp_min,
                $current_temp_max,
                $current_weather_main,
                $current_weather_description,
                $current_weather_icon,
                $current_dt,
                $current_area];
        } else {
            exit(0);
        }

        return $resArr;
    }

    public function getAfterWeather($city){

        $apiKey = '6cb7f876798991a9347508b91f5d503d';
        // 3시간 단위 날씨
        $wd = curl_init('http://api.openweathermap.org/data/2.5/forecast?q='.$city.'&units=metric&lang=kr&appid='.$apiKey.'');

        $weather_options = array(
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($wd, $weather_options);
        $a = curl_exec($wd);
        curl_close($wd);



        if (isset($a) && $a){
            $weather2 = json_decode($a);

            //    dd($weather2);

            $waArr = array();

            for ($i = 3; $i < 11; $i++ ){

                ${'after_3h_temp_'.$i} = $weather2->list[$i]->main->temp;
                ${'after_3h_temp_min_'.$i} = $weather2->list[$i]->main->temp_min;
                ${'after_3h_temp_max_'.$i} = $weather2->list[$i]->main->temp_max;
                ${'after_3h_weather_main_'.$i} = $weather2->list[$i]->weather[0]->main;
                ${'after_3h_weather_description_'.$i} = $weather2->list[$i]->weather[0]->description;
                ${'after_3h_weather_icon_'.$i} = "http://openweathermap.org/img/w/{$weather2->list[$i]->weather[0]->icon}.png";
                ${'after_3h_weather_dt_'.$i} = $weather2->list[$i]->dt_txt;

//                echo "<br>";
//                echo '3 기온 : '. ${'after_3h_temp_'.$i};
//                echo '3 최저기온'.${'after_3h_temp_min_'.$i};
//                echo '3 최고기온'.${'after_3h_temp_max_'.$i};
//                echo '날씨 : '.${'after_3h_weather_main_'.$i};
//                echo '설명 : '.${'after_3h_weather_description_'.$i};
//                echo '예상 시간 : '.${'after_3h_weather_dt_'.$i};

                $resArr = [
                   ${'after_3h_temp_'.$i},
                   ${'after_3h_temp_min_'.$i},
                   ${'after_3h_temp_max_'.$i},
                   ${'after_3h_weather_main_'.$i},
                   ${'after_3h_weather_description_'.$i},
                   ${'after_3h_weather_icon_'.$i},
                   ${'after_3h_weather_dt_'.$i},
                ];

                array_push($waArr, $resArr);

            }
        }else{
            exit(0);
        }

        return $waArr;
    }

}
