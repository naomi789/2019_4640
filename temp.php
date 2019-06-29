            $query = "INSERT IGNORE INTO user_performance (time_date, time_thinking, list_name, correct, ent_seq, email) VALUES(:date, :time_thinking, :listname, :correct, :ent_seq, :email);"
            //'".$date."','".$time_thinking.",'".$listname.",'".$correct.",'".$ent_seq.",'".$email."
            $statement = $db->prepare($query);
            $statement->bindValue(':date',$date);
            $statement->bindValue(':time_thinking',$time_thinking);
            $statement->bindValue(':listname',$listname);
            $statement->bindValue(':correct',$correct);
            $statement->bindValue(':ent_seq',$ent_seq);
            $statement->bindValue(':email',$email);
            $statement->execute();
            $statement->closecursor();
          }