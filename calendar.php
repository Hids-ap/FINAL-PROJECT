<?php
class view {

    private $collection = [];

    private $Ayear, $Amonth, $Aday;

    public function sort($date = null) {

        $this->Ayear = $date != null ? date('Y', strtotime($date)) : date('Y');
      
        $this->Amonth = $date != null ? date('m', strtotime($date)) : date('m');
      
        $this->Aday = $date != null ? date('d', strtotime($date)) : date('d');

    }


    public function add_event($txt, $date, $days = 1, $color = '') {
        $color = $color ? ' ' . $color : $color;
        $this->collection[] = [$txt, $date, $days, $color];
    }

    
    public function __toString() {

        $num_days = date('t', strtotime($this->Aday . '-' . $this->Amonth . '-' . $this->Ayear));

        $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->Aday . '-' . $this->Amonth . '-' . $this->Ayear)));
        
        $days = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];
        
        $first_day_of_week = array_search(date('D', strtotime($this->Ayear . '-' . $this->Amonth . '-1')), $days);
        
        $html = '<div class="calendar">';
        
        $html .= '<div class="header">';
        
        $html .= '<div class="month-year">';

        $html .= date('F Y', strtotime($this->Ayear . '-' . $this->Amonth . '-' . $this->Aday));
        
        $html .= '<div class="days">';
        
        foreach ($days as $day) {
        
            $html .= '
                <div class="day_name">
                    ' . $day . '
                </div>
            ';
        }
        
        for ($i = $first_day_of_week; $i > 0; $i--) {
        
            $html .= '
                <div class="day_num ignore">
                    ' . ($num_days_last_month-$i+1) . '
                </div>
            ';
        }
       
        for ($i = 1; $i <= $num_days; $i++) {
       
            $selected = '';
       
            if ($i == $this->Aday) {
       
                $selected = ' selected';
       
            }
       
            $html .= '<div class="day_num' . $selected . '">';
       
            $html .= '<span>' . $i . '</span>';

            foreach ($this->collection as $collection) {

                for ($d = 0; $d <= ($collection[2]-1); $d++) 
                {
                    if (date('y-m-d', strtotime($this->Ayear . '-' . $this->Amonth . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($collection[1]))) {
                      
                        $html .= '<div class="event' . $collection[3] . '">';
                      
                        $html .= $collection[0];
                      
                        $html .= '</div>';
                    }
                }
            }
          
            $html .= '</div>';
        }

        for ($i = 1; $i <= (35-$num_days-max($first_day_of_week, 0)); $i++) {
          
            $html .= '
                <div class="day_num ignore">
                    ' . $i . '
                </div>
            ';
        }
        
        return $html;
    }

}
?>
