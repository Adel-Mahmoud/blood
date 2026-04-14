import { useEffect, useState } from 'react';

export function NetworkStatus() {
  const [isOnline, setIsOnline] = useState(navigator.onLine);

  useEffect(() => {
    const handleOnline = () => setIsOnline(true);
    const handleOffline = () => setIsOnline(false);

    window.addEventListener('online', handleOnline);
    window.addEventListener('offline', handleOffline);

    return () => {
      window.removeEventListener('online', handleOnline);
      window.removeEventListener('offline', handleOffline);
    };
  }, []);

  if (isOnline) return null;

  return (
    <div style={{
      position: 'fixed',
      top: 0,
      left: 0,
      right: 0,
      background: '#dc2626',
      color: 'white',
      textAlign: 'center',
      padding: '12px',
      zIndex: 9999,
      fontWeight: 'bold'
    }}>
      ⚠️ لا يوجد اتصال بالإنترنت - يتم عرض نسخة غير متصلة
    </div>
  );
}