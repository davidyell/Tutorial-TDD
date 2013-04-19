watch("Classes/(.*).php") do |match|
  run_test %{Tests/#{match[1]}Test.php}
end

watch("Tests/.*Test.php") do |match|
  run_test match[0]
end

def run_test(file)
  unless File.exist?(file)
    puts "#{file} does not exist"
    return
  end

  clear_console

  puts "Running #{file}"
  result = `phpunit #{file}`
  puts result

  if result.match(/OK/)
    notify "#{file}", "Tests Passed Successfuly", "success.png", 2000
  elsif result.match(/FAILURES\!/)
    notify_failed file, result
  end
end

def notify title, msg, img, show_time
  images_dir='~/.autotest/images'
  system "notify-send '#{title}' '#{msg}' -i #{images_dir}/#{img} -t #{show_time}"
end

def notify_failed cmd, result
  failed_examples = result.scan(/failure:\n\n(.*)\n/)
  notify "#{cmd}", failed_examples[0], "failure.png", 6000
end

def clear_console
  puts "\e[H\e[2J"  #clear console
end