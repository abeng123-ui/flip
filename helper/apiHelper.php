<?php
class apiHelper{
  
    // specify your own database credentials
    private $secret_key = "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41";
    private $url_flip = "https://nextar.flip.id";
    private $header = array(
                "Content-Type: application/x-www-form-urlencoded"
            );
    
  
    public function post($param=[])
    {
        try{

            $ch = curl_init();

            $url = $this->url_flip.'/'.'disburse';

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);

            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));

            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);

            curl_setopt($ch, CURLOPT_USERPWD, $this->secret_key.":");

            $response = curl_exec($ch);
            curl_close($ch);

        } catch (Exception $e) {
            $response = [];
        } catch (Throwable $e) {
            $response = [];
        }
  
        return $response;
    }

    public function get($param=[])
    {
        try{
            $ch = curl_init();
            $url = $this->url_flip.'/'.'disburse'.'/'.$param['id'];

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);

            curl_setopt($ch, CURLOPT_USERPWD, $this->secret_key.":");

            $response = curl_exec($ch);
            curl_close($ch);

        } catch (Exception $e) {
            $response = [];
        }catch (Throwable $e) {
            $response = [];
        }

        return $response;
    }

        



}
?>