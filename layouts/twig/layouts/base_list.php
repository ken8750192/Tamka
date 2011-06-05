<?php            foreach (JFolder::files($this->layoutFolder.'/layouts/') AS $file) {
                if(strstr($file, $base)) {
                    // Each template could be fed with custom vars
                    $tmpl = JString::substr(JFile::stripExt($file), JString::strlen($base));
                    var_dump($tmpl);
                    if(isset($this->{$tmpl})) {
                        $data['this'] = $this->{$tmpl};
                    }

                    // Handle rowsets, must be done prettier (would prefer this being done in twig not here
                    if($tmpl == 'list' && isset($this->rowset)) {
                        echo $tmpl;
                        foreach($this->rowset AS $row) {
                            $data['data'] = $row;
                            $this->twig->loadTemplate('/twig/layouts/'.$file)->display($data);
                        }
                    }
                    else {
                        $data['data'] = $this->rowset;
                        $this->twig->loadTemplate('/twig/layouts/'.$file)->display($data);
                    }
                }
            }
