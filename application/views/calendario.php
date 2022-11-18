    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'pt-br',
            
            events: [
                { 
                    groupId: 'teste',
                    title: 'Gerenciar o usuario',
                    description: 'Teste do Usuário',
                    start: '2021-02-03T13:00:00',
                },
            ]
        });
        
        calendar.render();
      });

    </script>
    
    <script>
        $(document).ready(function(){
          $('#teste').tooltip({title: "Hooray!", animation: true}); 
        });
    </script>
    
    <style>
        #calendar{
            position: relative;
            width: 97%;
            margin: 0px auto;
        }   
    </style>



    <div id='calendar'></div>
